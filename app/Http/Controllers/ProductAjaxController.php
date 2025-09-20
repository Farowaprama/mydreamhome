<?php

           

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;           

use App\Models\Product;
use App\Models\User;
use App\Models\TblSetBill;

use Illuminate\Http\Request;

use DataTables;

use Auth;
use DB;
class ProductAjaxController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

     //dd($request);

        if ($request->ajax()) {

  

            //$data = User::latest()->where('landlord_id',Auth::id())->get();
            $data = User::select('users.id', DB::raw("CONCAT(users.firstname,' ',users.lastname)  AS fname"), 'users.firstname','users.lastname','users.status','users.mobile','users.email','users.created_at','tbl_set_bills.flat_no','tbl_set_bills.total_bill','tbl_set_bills.id as flat_id','tbl_set_bills.e_meter_no')
            ->join('tbl_set_bills','tbl_set_bills.id','=','users.flat_id')
            ->where('landlord_id',Auth::id())
            ->orderBy('users.id','DESC')
            ->get();
           
            
            //dd($data);
            //$data = User::latest()->get();

            

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('status', function($row){

                        //TblSetBill::where('renter_id', '=', $row->id)->exists()
                        
                        if ($row->status == 1) {
                            $btn="";
                            $btn = $btn.'<a  onclick="ajaxApprove('.$row->id.',this,0)"   data-original-title="Edit" class="edit btn btn-success btn-sm editBill">Active</a>';
                         }
                         else{

                            $btn = '<a  onclick="ajaxApprove('.$row->id.',this,1)"   data-original-title="Edit" class="edit btn btn-danger btn-sm setBill">Inactive</a>';
                         }

                       

                       



                        // $btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->flat_id.'"  user_id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm payBill">Pay Bill</a>';

 

                         return $btn;

                 })

                    ->addColumn('action', function($row){

   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct mr-2 mb-2">Edit</a>';

   

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct mr-2 mb-2">Delete</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->flat_id.'"  user_id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm payBill mr-2 mb-2">Pay Bill</a>';

                           $btn = $btn.'<a href="' . url('renter_dashboard/rid' . $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm renter_dashboard mr-2 mb-2">Dashboard</a>';

    

                            return $btn;

                    })

                    ->rawColumns(['action','status'])

                    ->make(true);

        }

        $flat_list = TblSetBill::latest()->where('created_by',Auth::id())->get();
       

        return view('productAjax',compact('flat_list'));

    }

       

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    // public function store(Request $request)

    // {

    //     Product::updateOrCreate([

    //                 'id' => $request->product_id

    //             ],

    //             [

    //                 'name' => $request->name, 

    //                 'detail' => $request->detail

    //             ]);        

     

    //     return response()->json(['success'=>'Product saved successfully.']);

    // }

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $product = User::find($id);

        return response()->json($product);

    }

    public function edit_set_bill($id)

    {

        $product = User::find($id);

        return response()->json($product);

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        user::find($id)->delete();

      

        return response()->json(['success'=>'user deleted successfully.']);

    }

}