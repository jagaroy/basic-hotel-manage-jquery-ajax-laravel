<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use DB;
use Yajra\Datatables\Datatables;
use Image;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data["roomtypes"] = \App\Models\RoomType::get();
		

        if ($request->ajax()) {

            $model = Room::with('roomtypes_relation');
			return DataTables::of($model)
				->addIndexColumn()
				->addColumn('roomtypes_relation', function (Room $room) {
					// belongsTo (one)
					return $room->roomtypes_relation->room_type ?? '';
					// use map for // belongsToMany
				})

                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    onclick="editRoom(event)" class="edit_btn btn btn-xs btn-info">
                                                    Edit
                                                </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    data-url="'.url('rooms/'.$row['id']).'"
                                                    class="btn btn-xs btn-danger delete-ajax">
                                                    Delete
                                                </a>';

                            return $btn;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }

        return view('backend.rooms.index', $data);
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_type_id' => 'required',
			'room_description' => 'required',
			'room_status' => 'required',
			
        ]);

        $requests = $request->all();

        

        
        

        $requests['authored_by'] = \Auth::user()->id;

        $room = Room::create($requests);
        $id = $room->id;

        $room = Room::where("id", $id)->with("roomtypes_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Room Saved successfully!', 'room'=>$room], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::find($id);

        return response()->json($room);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_type_id' => 'required',
			'room_description' => 'required',
			'room_status' => 'required',
			
        ]);

        $requests = $request->all();

        foreach ($requests as $key => $value) {
            // for multiple values array like checkbox
            if(is_array($value)){
                // convert to json string
                $requests[$key] = json_encode($value);
            }
        }

        // for date input filter
        

        // checkbox not updated on null requested
        
        

        $requests['authored_by'] = \Auth::user()->id;

        Room::find($id)->update($requests);

        $room = Room::where("id", $id)->with("roomtypes_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Room Updated successfully!', 'room'=>$room], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $room = Room::find($id)->delete();

      return response()->json(['status'=>'success', 'message'=>'Data Deleted successfully'], 200);
    }
}
