<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblSetBill;
use App\Models\User;
use App\Models\Tolate;

use DataTables;
use Auth;
use DB;

use Validator;

class FlatManagementController extends Controller
{
    public function index(Request $request)

    {

     

        if ($request->ajax()) {

            $data = TblSetBill::latest()->where('created_by',Auth::id())->get();
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('status', function($row){

                        $booked = User::where('flat_id',$row->id)->where('status', '!=' , 0)->exists();

                        if($booked){
                            $btn = '<a    data-id="'.$row->id.'"  class=" badge badge-pill  btn-success btn-sm BooKed">    BooKed   </a>';
                        }
                        else{
                            $btn = '<a   data-id="'.$row->id.'"  class=" badge badge-pill btn-danger btn-sm notBooked">Non Booked</a>';
                        }

                            
                            

                         return $btn;

                 })

                    ->addColumn('action', function($row){

   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm mr-2 mb-2 editBill">Update Flat</a>';

                           $tolate = Tolate::where('set_bill_id',$row->id)->where('user_id', Auth::id())->exists();
                           if($tolate){

                            $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm mr-2 mb-2 editTolate">Edit Tolate</a>';

                           }
                           else{
                            $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-success btn-sm mr-2 mb-2 setTolate">Add Tolate</a>';

                           }

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm mr-2 mb-2 deleteflat">Delete</a>';

    

                            return $btn;

                    })

                    ->rawColumns(['action','status'])

                    ->make(true);

        }

        $division = DB::table('divisions')->get();

        //$house_info = DB::table('house_information')->where('user_id', Auth::id())->first();
        //$user_info = DB::table('user_information')->where('user_id', Auth::id())->first();
        

        return view('flatManagement',compact('division'));

    }

    // public function set_bill_store(Request $request){
    //     //dd($req);
    //     $total_bill=$request->house_rent+$request->gas_bill+$request->water_bill+$request->garbage_bill+$request->service_charge;
    //     //dd($total_bill);
    //     TblSetBill::updateOrCreate([

    //         'id' => $request->flat_id

    //     ],

    //     [

            
    //         'flat_no' => $request->flat_no, 
    //         'house_rent' => $request->house_rent, 
    //         'gas_bill' => $request->gas_bill, 
    //         'water_bill' => $request->water_bill, 
    //         'garbage_bill' => $request->garbage_bill, 
    //         'service_charge' => $request->service_charge, 
    //         'total_bill' => $total_bill, 
    //         'created_by' => Auth::id(),

    //     ]);        



    //     return response()->json(['success'=>'Product saved successfully.']);
     
    // }

    public function store(Request $request){

        
        $validator = Validator::make($request->all(), [
            //'flat_no' => 'required|unique:tbl_set_bills|max:255',
            'flat_no'=>[\Illuminate\Validation\Rule::unique('tbl_set_bills')->where(function ($query) use ($request) {
                $q = $query
                    ->where('flat_no', $request->flat_no)
                    ->where('created_by', auth()->user()->id)
                    ->where('id', '!=', $request->flat_id);
                return $q;
            }),
                'required',
            ],
            'house_rent' => 'required',
        ]);
        
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{

        $total_bill=$request->house_rent+$request->gas_bill+$request->water_bill+$request->garbage_bill+$request->service_charge;
        //dd($total_bill);
        TblSetBill::updateOrCreate([

            'id' => $request->flat_id

        ],

        [

            
            'flat_no' => $request->flat_no, 
            'e_meter_no' => $request->e_meter_no, 
            'house_rent' => $request->house_rent, 
            'gas_bill' => $request->gas_bill, 
            'water_bill' => $request->water_bill, 
            'garbage_bill' => $request->garbage_bill, 
            'service_charge' => $request->service_charge, 
            'total_bill' => $total_bill, 
            'created_by' => Auth::id(),

        ]);        



        //return response()->json(['success'=>' saved successfully.']);
        return response()->json(['status'=>1, 'success'=>'New Flat has been successfully added']);
    }
    }

    public function edit($id)

    {

        $product = TblSetBill::find($id);

        return response()->json($product);

    }

    public function destroy($id)

    {
        //dd($id);

        TblSetBill::find($id)->delete();

      

        return response()->json(['success'=>'user deleted successfully.']);

    }

}
