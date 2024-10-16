<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use DB;
use Yajra\Datatables\Datatables;
use Image;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = [];
        $data["items"] = \App\Models\Item::select("id", "item_name")->get();
		$data["bookings"] = \App\Models\Booking::select("id", "check_in_time")->get();
		

        if ($request->ajax()) {

            $model = Order::with('bookings_relation')->with('items_relation');
			return DataTables::of($model)
				->addIndexColumn()
				->addColumn('items_relation', function (Order $order) {
					// belongsTo (one)
					return $order->items_relation->item_name ?? '';
					// use map for // belongsToMany
				})
				->addColumn('bookings_relation', function (Order $order) {
					// belongsTo (one)
					return $order->bookings_relation->check_in_time ?? '';
					// use map for // belongsToMany
				})

                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    onclick="editOrder(event)" class="edit_btn btn btn-xs btn-info">
                                                    Edit
                                                </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    data-url="'.url('orders/'.$row['id']).'"
                                                    class="btn btn-xs btn-danger delete-ajax">
                                                    Delete
                                                </a>';

                            return $btn;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }

        return view('backend.orders.index', $data);
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
            'item_id' => 'required',
			'booking_id' => 'required',
			'order_item_quantity' => 'required',
			'order_cost' => 'required',
			'order_time' => 'required',
			'order_status' => 'required',
			
        ]);

        $requests = $request->all();

        

        
        

        $requests['authored_by'] = \Auth::user()->id;

        $order = Order::create($requests);
        $id = $order->id;

        $order = Order::where("id", $id)->with("items_relation")->with("bookings_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Order Saved successfully!', 'order'=>$order], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        return response()->json($order);
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
            'item_id' => 'required',
			'booking_id' => 'required',
			'order_item_quantity' => 'required',
			'order_cost' => 'required',
			'order_time' => 'required',
			'order_status' => 'required',
			
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

        Order::find($id)->update($requests);

        $order = Order::where("id", $id)->with("items_relation")->with("bookings_relation")->first();
		
        return response()->json(['status'=>'success', 'message'=>'Order Updated successfully!', 'order'=>$order], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $order = Order::find($id)->delete();

      return response()->json(['status'=>'success', 'message'=>'Data Deleted successfully'], 200);
    }
}
