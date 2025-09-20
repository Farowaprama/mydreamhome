<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\RenterPayBill;
use App\Models\TblSetBill;

use DataTables;
use Auth;

use DB;
use Validator;

class PayBillContoller extends Controller
{
    public function index(Request $request)

    {

     

        if ($request->ajax()) {

  
            $data = DB::table('users')
            ->select('users.id',DB::raw("CONCAT(users.firstname,' ',users.lastname)  AS firstname"),'users.lastname','users.mobile','users.email','users.created_at','tbl_set_bills.flat_no','tbl_set_bills.total_bill','tbl_set_bills.id as flat_id')
            ->join('tbl_set_bills','tbl_set_bills.id','=','users.flat_id')
            ->where('landlord_id',Auth::id())
            ->orderBy('users.id','DESC')
            ->get();
          
     

            

            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('status', function($row){

                    


                        $btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->flat_id.'"  user_id="'.$row->id.'" data-original-title="Delete" class="btn btn-success btn-sm payBill mr-2 mb-2">Pay Bill</a>';

                        $btn = $btn.'<a href="'.url('pay_bill_list/'.$row->id).'"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-danger btn-sm mr-2 mb-2">Due Bill</a>';
                        
                         return $btn;

                 })

                    ->addColumn('action', function($row){

   

                        $btn = '<a href="' . url('renter_dashboard/rid' . $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm renter_dashboard">Dashboard</a>';

    

                            return $btn;

                    })

                    ->rawColumns(['action','status'])

                    ->make(true);

        }

        $flat_list = TblSetBill::latest()->where('created_by',Auth::id())->get();

        return view('billing_history',compact('flat_list'));

    }



    public function paybilllist(Request $request, $id = null, $type= null)

    {

     //



        if ($request->ajax()) {
            

            //dd($id);

            //$data = User::latest()->where('landlord_id',Auth::id())->get();
            $data = DB::table('renter_pay_bills')
            ->select('renter_pay_bills.id','renter_pay_bills.renter_id','renter_pay_bills.due_bill','renter_pay_bills.total_pay','renter_pay_bills.month','renter_pay_bills.created_at','renter_pay_bills.pay_year','renter_pay_bills.note','tbl_set_bills.flat_no','tbl_set_bills.total_bill','tbl_set_bills.id as flat_id',DB::raw("CONCAT(users.firstname,' ',users.lastname)  AS firstname"),'users.mobile')
            ->join('tbl_set_bills','tbl_set_bills.id','=','renter_pay_bills.flat_id')
            ->join('users','users.id','=','renter_pay_bills.renter_id');
            if(Auth::user()->usertype == 'landlord' && empty($id) ){
                //->where('renter_pay_bills.created_by',Auth::id());
                $data= $data->where('renter_pay_bills.created_by',Auth::id());
            }
            if(Auth::user()->usertype == 'renter' && empty($id)){
                //->where('renter_pay_bills.created_by',Auth::id());
                $data= $data->where('renter_pay_bills.renter_id', Auth::id())->orderBy('renter_pay_bills.id','DESC');
            }

            
            if(isset($id) && !empty($id)){

                $data= $data->where('renter_pay_bills.renter_id',$id)->orderBy('renter_pay_bills.id','DESC');

            }

            // elseif(isset($type) && !empty($type) && $type=='due'){

            //     $data= $data->where('renter_pay_bills.renter_id',$id)->orderBy('renter_pay_bills.id','DESC');

            // }
           
            else{
                $data= $data->orderBy('renter_pay_bills.id','DESC');
            }


            
            
            //dd($data);
            //$data = User::latest()->get();

            

            return Datatables::of($data)

                    ->addIndexColumn()

                
                    ->addColumn('action', function($row){
                        $btn = '';
                        if(Auth::user()->usertype != 'renter'){
                        $btn =' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'"  data-original-title="Edit" class="btn btn-success btn-sm editpayBill mr-2 mb-2">Update Bill</a>';
                        }
                       $btn = $btn.'<a href="' . url('receipt/' . $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-danger btn-sm mr-2 mb-2">Receipt</a>';
                        // $btn = $btn.'<a href="' . url('renter_dashboard/rid' . $row->id) . '" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-danger btn-sm renter_dashboard">Dashboard</a>';
                         return $btn;

                 })

                 ->addColumn('status', function ($row) {
                    //$booked = User::where('flat_id',$row->id)->exists();

                        if(!is_null($row->due_bill) && !empty($row->due_bill) ){

                            $btn = '<a   data-id="'.$row->id.'"  class=" badge badge-pill btn-danger btn-sm ">  Due </a>';
                           
                        }
                        else{
                            

                            $btn = '<a    data-id="'.$row->id.'"  class="badge badge-pill  btn-success btn-sm ">    Paid   </a>';
                        }

                            
                            

                         return $btn;
                    // return '<div class="badge badge-pill badge-secondary">'.Sub_Category::where('category_id', $result->id)->count(). ' </div>';
              })

                    // ->addColumn('action', function($row){

   

                    //        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';

   

                    //        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';

    

                    //         return $btn;

                    // })

                    ->rawColumns(['action','status'])

                    ->make(true);

        }

        $flat_list = TblSetBill::latest()->where('created_by',Auth::id())->get();
       // dd($flat_list);
        return view('billing_history_list',compact('flat_list','id'));

    }

    public function edit($id)

    {

       // $product = RenterPayBill::find($id);
        $product = DB::table('renter_pay_bills')
            ->select('renter_pay_bills.id','renter_pay_bills.renter_id','renter_pay_bills.flat_id','renter_pay_bills.total_pay','renter_pay_bills.due_bill','renter_pay_bills.house_rent_pay','renter_pay_bills.gas_bill_pay','renter_pay_bills.water_bill_pay','renter_pay_bills.garbage_bill_pay','renter_pay_bills.service_charge_pay','renter_pay_bills.month','renter_pay_bills.created_at','renter_pay_bills.note','renter_pay_bills.pay_year','tbl_set_bills.flat_no','tbl_set_bills.total_bill','tbl_set_bills.house_rent','tbl_set_bills.gas_bill','tbl_set_bills.water_bill','tbl_set_bills.garbage_bill','tbl_set_bills.service_charge','users.firstname','users.mobile')
            ->join('tbl_set_bills','tbl_set_bills.id','=','renter_pay_bills.flat_id')
            ->join('users','users.id','=','renter_pay_bills.renter_id')
            ->where('renter_pay_bills.id',$id)->first();
        //dd($product);
        return response()->json($product);

    }

    public function due_bill_list($id)

    {

       // $product = RenterPayBill::find($id);
        $product = DB::table('renter_pay_bills')
            ->select('renter_pay_bills.id','renter_pay_bills.renter_id','renter_pay_bills.due_bill','renter_pay_bills.total_pay','renter_pay_bills.month','renter_pay_bills.created_at','tbl_set_bills.flat_no','tbl_set_bills.total_bill','tbl_set_bills.id as flat_id','users.firstname','users.mobile')
            ->join('tbl_set_bills','tbl_set_bills.id','=','renter_pay_bills.flat_id')
            ->join('users','users.id','=','renter_pay_bills.renter_id')
            ->where('renter_pay_bills.renter_id',$id);
        //dd($product);
        return response()->json($product);

    }

    public function store(Request $request){
       //dd($request);
       $validator = Validator::make($request->all(), [
        //'flat_no' => 'required|unique:tbl_set_bills|max:255',
        'month'=>[\Illuminate\Validation\Rule::unique('renter_pay_bills')->where(function ($query) use ($request) {
            $q = $query
                ->where('month', $request->month)
                ->where('pay_year', $request->pay_year)
                ->where('renter_id', $request->user_id)
                ->where('id', '!=', $request->id);
            return $q;
        }),
            'required',
        ],
        'pay_year' => 'required',
    ]);
    
    if(!$validator->passes()){
        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }else{

        $total_bill_pay=$request->house_rent+$request->gas_bill+$request->water_bill+$request->garbage_bill+$request->service_charge;
        //dd($total_bill);
        $due_bill = $request->actual_total_bill - $total_bill_pay;
        
        $renterpay = RenterPayBill::updateOrCreate([

            'id' => $request->id

        ],

        [
            'renter_id' => $request->user_id, 
            'flat_id' => $request->flat_id,
            'month' => $request->month,
            'note' => $request->note,
            'pay_year' => $request->pay_year,
            'total_pay' => $total_bill_pay,
            'due_bill' => $due_bill,
            'house_rent_pay' => $request->house_rent, 
            'gas_bill_pay' => $request->gas_bill, 
            'water_bill_pay' => $request->water_bill, 
            'garbage_bill_pay' => $request->garbage_bill, 
            'service_charge_pay' => $request->service_charge, 
            'created_by' => Auth::id(),

        ]);        



       // return response()->json(['success'=>'Product saved successfully.']);
       if ($renterpay)
            return response()->json([
                'status' => 200,
                'id' => $renterpay->id,
                'msg' => 'saved successfully'
            ]);
        else
            return response()->json([
                'status' => 200,
                'msg' => 'Error Occured'
            ]);

        }
     
    }

    public function show_receipt($id)

    {

        //dd($id);

       // $product = RenterPayBill::find($id);
        $data['receipt_info'] = DB::table('renter_pay_bills')
            ->select('renter_pay_bills.id','renter_pay_bills.renter_id','renter_pay_bills.note','renter_pay_bills.pay_year','renter_pay_bills.house_rent_pay','renter_pay_bills.gas_bill_pay','renter_pay_bills.water_bill_pay','renter_pay_bills.garbage_bill_pay','renter_pay_bills.service_charge_pay','renter_pay_bills.due_bill','renter_pay_bills.total_pay','renter_pay_bills.month','renter_pay_bills.created_at','tbl_set_bills.flat_no','tbl_set_bills.total_bill','tbl_set_bills.id as flat_id','tbl_set_bills.house_rent','tbl_set_bills.gas_bill','tbl_set_bills.water_bill','tbl_set_bills.garbage_bill','tbl_set_bills.service_charge','users.firstname','users.lastname','users.email','users.mobile','users.created_at as join_at')
            ->join('tbl_set_bills','tbl_set_bills.id','=','renter_pay_bills.flat_id')
            ->join('users','users.id','=','renter_pay_bills.renter_id')
            ->where('renter_pay_bills.id',$id)
            ->where('users.landlord_id', Auth::id())
            ->first();
        //dd($data);
        $data['landlord_info']= DB::table('user_information')->select('house_name', 'location', 'holding_no','mobile','email','sign_image')->join('users','users.id','=','user_information.user_id')->where('user_information.user_id', Auth::id())->first();
        //dd($data);
        //return response()->json($product);
        return view('renter/show_receipt',compact('data','id'));

    }
}
