<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use DB;
use Yajra\Datatables\Datatables;
use Image;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data["bookings"] = \App\Models\Booking::select("id", "check_in_time")->get();
		

        if ($request->ajax()) {

            $model = Reminder::with('bookings_relation');
			return DataTables::of($model)
				->addIndexColumn()
				->addColumn('bookings_relation', function (Reminder $reminder) {
					// belongsTo (one)
					return $reminder->bookings_relation->check_in_time ?? '';
					// use map for // belongsToMany
				})

                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    onclick="editReminder(event)" class="edit_btn btn btn-xs btn-info">
                                                    Edit
                                                </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    data-url="'.url('reminders/'.$row['id']).'"
                                                    class="btn btn-xs btn-danger delete-ajax">
                                                    Delete
                                                </a>';

                            return $btn;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }

        return view('backend.reminders.index', $data);
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
            'booking_id' => 'required',
			'reminder_description' => 'required',
			'reminder_time' => 'required',
			'reminder_status' => 'required',
			
        ]);

        $requests = $request->all();

        

        
        

        $requests['authored_by'] = \Auth::user()->id;

        $reminder = Reminder::create($requests);
        $id = $reminder->id;

        $reminder = Reminder::where("id", $id)->with("bookings_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Reminder Saved successfully!', 'reminder'=>$reminder], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reminder = Reminder::find($id);

        return response()->json($reminder);
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
            'booking_id' => 'required',
			'reminder_description' => 'required',
			'reminder_time' => 'required',
			'reminder_status' => 'required',
			
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

        Reminder::find($id)->update($requests);

        $reminder = Reminder::where("id", $id)->with("bookings_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Reminder Updated successfully!', 'reminder'=>$reminder], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $reminder = Reminder::find($id)->delete();

      return response()->json(['status'=>'success', 'message'=>'Data Deleted successfully'], 200);
    }
}
