<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use DB;
use Yajra\Datatables\Datatables;
use Image;

class CustomerController extends Controller
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

            $customers = Customer::get();

			return Datatables::of($customers)

				->addIndexColumn()

                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    onclick="editCustomer(event)" class="edit_btn btn btn-xs btn-info">
                                                    Edit
                                                </a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row['id'].'"
                                                    data-url="'.url('customers/'.$row['id']).'"
                                                    class="btn btn-xs btn-danger delete-ajax">
                                                    Delete
                                                </a>';

                            return $btn;
                    })

                    ->rawColumns(['action'])

                    ->make(true);
        }

        return view('backend.customers.index', $data);
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
            'customer_name' => 'required',
			'customer_address' => 'required',
			'customer_gender' => 'required',
			'customer_status' => 'required',
			
        ]);

        $requests = $request->all();

        

        
        if(request()->hasFile("customer_photo")){
			$image = request()->file("customer_photo");
			$extension = $image->getClientOriginalExtension();
			$uploadDir = "/upload/customers/";
			$destinationPath = public_path($uploadDir);
			if(!is_dir($destinationPath)){
				mkdir($destinationPath);
			}
			$img_name = "customer_photo-".time().".".$extension;
			$img = Image::make($image->getRealPath());
			$img->resize(768, 432)->save($destinationPath."/". $img_name);
			$requests["customer_photo"] = $uploadDir . $img_name;
		}


        $requests['authored_by'] = \Auth::user()->id;

        $customer = Customer::create($requests);
        $id = $customer->id;

        $customer = Customer::where("id", $id)->first();
		
        return response()->json(['status'=>'success', 'message'=>'Customer Saved successfully!', 'customer'=>$customer], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return response()->json($customer);
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
            'customer_name' => 'required',
			'customer_address' => 'required',
			'customer_gender' => 'required',
			'customer_status' => 'required',
			
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
        
        if(request()->hasFile("customer_photo")){
			$image = request()->file("customer_photo");
			$extension = $image->getClientOriginalExtension();
			$uploadDir = "/upload/customers/";
			$destinationPath = public_path($uploadDir);
			if(!is_dir($destinationPath)){
				mkdir($destinationPath);
			}
			$img_name = "customer_photo-".time().".".$extension;
			$img = Image::make($image->getRealPath());
			$img->resize(768, 432)->save($destinationPath."/". $img_name);
			$requests["customer_photo"] = $uploadDir . $img_name;
		}


        $requests['authored_by'] = \Auth::user()->id;

        Customer::find($id)->update($requests);

        $customer = Customer::where("id", $id)->first();
		
        return response()->json(['status'=>'success', 'message'=>'Customer Updated successfully!', 'customer'=>$customer], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $customer = Customer::find($id)->delete();

      return response()->json(['status'=>'success', 'message'=>'Data Deleted successfully'], 200);
    }
}
