<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use DB;
use Yajra\Datatables\Datatables;
use Image;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        

        if ($request->ajax()) {

            $roomtypes = RoomType::get();

			return Datatables::of($roomtypes)

				->addIndexColumn()

                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    onclick="editRoomType(event)" class="edit_btn btn btn-xs btn-info">
                                                    Edit
                                                </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    data-url="'.url('roomtypes/'.$row['id']).'"
                                                    class="btn btn-xs btn-danger delete-ajax">
                                                    Delete
                                                </a>';

                            return $btn;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }

        return view('backend.roomtypes.index', $data);
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
            'room_type' => 'required',
			'room_type_image' => 'required',
			'room_type_desc' => 'required',
			'room_type_status' => 'required',
			
        ]);

        $requests = $request->all();

        

        
        if(request()->hasFile("room_type_image")){
			$image = request()->file("room_type_image");
			$extension = $image->getClientOriginalExtension();
			$uploadDir = "/upload/roomtypes/";
			$destinationPath = public_path($uploadDir);
			if(!is_dir($destinationPath)){
				mkdir($destinationPath);
			}
			$img_name = "room_type_image-".time().".".$extension;
			$img = Image::make($image->getRealPath());
			$img->resize(768, 432)->save($destinationPath."/". $img_name);
			$requests["room_type_image"] = $uploadDir . $img_name;
		}


        $requests['authored_by'] = \Auth::user()->id;

        $roomtype = RoomType::create($requests);
        $id = $roomtype->id;

        $roomtype = RoomType::where("id", $id)->first();
		
        return response()->json(['status'=>'success', 'message'=>'RoomType Saved successfully!', 'roomtype'=>$roomtype], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $roomtype = RoomType::find($id);

        return response()->json($roomtype);
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
            'room_type' => 'required',
			'room_type_image' => 'required',
			'room_type_desc' => 'required',
			'room_type_status' => 'required',
			
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
        
        if(request()->hasFile("room_type_image")){
			$image = request()->file("room_type_image");
			$extension = $image->getClientOriginalExtension();
			$uploadDir = "/upload/roomtypes/";
			$destinationPath = public_path($uploadDir);
			if(!is_dir($destinationPath)){
				mkdir($destinationPath);
			}
			$img_name = "room_type_image-".time().".".$extension;
			$img = Image::make($image->getRealPath());
			$img->resize(768, 432)->save($destinationPath."/". $img_name);
			$requests["room_type_image"] = $uploadDir . $img_name;
		}


        $requests['authored_by'] = \Auth::user()->id;

        RoomType::find($id)->update($requests);

        $roomtype = RoomType::where("id", $id)->first();
		
        return response()->json(['status'=>'success', 'message'=>'RoomType Updated successfully!', 'roomtype'=>$roomtype], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $roomtype = RoomType::find($id)->delete();

      return response()->json(['status'=>'success', 'message'=>'Data Deleted successfully'], 200);
    }
}
