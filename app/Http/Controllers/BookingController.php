<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use DB;
use Yajra\Datatables\Datatables;
use Image;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // phpinfo();die;
        // $content = "";$zip = public_path('files/cv.docx');die;

        $data = [];
        $data["rooms"] = \App\Models\Room::select("id", "room_number")->get();
		$data["customers"] = \App\Models\Customer::select("id", "customer_name")->get();
		

        if ($request->ajax()) {

            $model = Booking::with('customers_relation')->with('rooms_relation');
			return DataTables::of($model)
				->addIndexColumn()
				->addColumn('rooms_relation', function (Booking $booking) {
					// belongsTo (one)
					return $booking->rooms_relation->room_number ?? '';
					// use map for // belongsToMany
				})
				->addColumn('customers_relation', function (Booking $booking) {
					// belongsTo (one)
					return $booking->customers_relation->customer_name ?? '';
					// use map for // belongsToMany
				})

                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    onclick="editBooking(event)" class="edit_btn btn btn-xs btn-info">
                                                    Edit
                                                </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    data-url="'.url('bookings/'.$row['id']).'"
                                                    class="btn btn-xs btn-danger delete-ajax">
                                                    Delete
                                                </a>';

                            return $btn;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }

        return view('backend.bookings.index', $data);
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
            'room_id' => 'required',
			'customer_id' => 'required',
			'booking_date' => 'required',
			'check_in_time' => 'required',
			'check_out_time' => 'required',
			'booking_status' => 'required',
			
        ]);

        $requests = $request->all();

        

        $requests["booking_date"] = date("Y-m-d", strtotime($requests["booking_date"]));
		
        

        $requests['authored_by'] = \Auth::user()->id;

        $booking = Booking::create($requests);
        $id = $booking->id;

        $booking = Booking::where("id", $id)->with("rooms_relation")->with("customers_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Booking Saved successfully!', 'booking'=>$booking], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);

        return response()->json($booking);
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
            'room_id' => 'required',
			'customer_id' => 'required',
			'booking_date' => 'required',
			'check_in_time' => 'required',
			'check_out_time' => 'required',
			'booking_status' => 'required',
			
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
        $requests["booking_date"] = date("Y-m-d", strtotime($requests["booking_date"]));
		

        // checkbox not updated on null requested
        
        

        $requests['authored_by'] = \Auth::user()->id;

        Booking::find($id)->update($requests);

        $booking = Booking::where("id", $id)->with("rooms_relation")->with("customers_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Booking Updated successfully!', 'booking'=>$booking], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $booking = Booking::find($id)->delete();

      return response()->json(['status'=>'success', 'message'=>'Data Deleted successfully'], 200);
    }
}
