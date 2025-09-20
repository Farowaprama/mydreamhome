<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Models\TblSetBill;
use App\Models\User;
use App\Models\HouseInformation;
use App\Models\UserInformation;
use App\Models\Tolate;

use DataTables;
use Auth;
use DB;
use Validator;



class TolateController extends Controller
{
   

    function fetch(Request $request)
    {
        $table = $request->get('table');
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table($table)
            ->where($select, $value)
            ->get();
        $output = '<option value="">Select ' . $table . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        echo $output;
    }

    public function store(Request $request){

       

        //dd($request->file('image_file'));
        $validator = Validator::make($request->all(), [
            //'flat_no' => 'required|unique:tbl_set_bills|max:255',
            // 'flat_no'=>[\Illuminate\Validation\Rule::unique('tbl_set_bills')->where(function ($query) use ($request) {
            //     $q = $query
            //         ->where('flat_no', $request->flat_no)
            //         ->where('created_by', auth()->user()->id)
            //         ->where('id', '!=', $request->flat_id);
            //     return $q;
            // }),
            //     'required',
            // ],
            'beds' => 'required',
        ]);
        
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{

        // $total_bill=$request->house_rent+$request->gas_bill+$request->water_bill+$request->garbage_bill+$request->service_charge;
        // //dd($total_bill);
        // TblSetBill::updateOrCreate([

        //     'id' => $request->flat_id

        // ],

        // [

            
        //     'flat_no' => $request->flat_no, 
        //     'e_meter_no' => $request->e_meter_no, 
        //     'house_rent' => $request->house_rent, 
        //     'gas_bill' => $request->gas_bill, 
        //     'water_bill' => $request->water_bill, 
        //     'garbage_bill' => $request->garbage_bill, 
        //     'service_charge' => $request->service_charge, 
        //     'total_bill' => $total_bill, 
        //     'created_by' => Auth::id(),

        // ]);  
        
        $house_information_id =  HouseInformation::where('user_id', Auth::id())->where('set_bill_id', $request->set_bill_id)->first()->id ?? '';
        if ($house_information_id > 0) {
            $dt = HouseInformation::find($house_information_id);
        } else {
            $dt = new HouseInformation;
        }

        $dt->user_id = Auth::id();
        $dt->set_bill_id = $request->set_bill_id;
        $dt->num_of_beds = $request->beds;
        $dt->num_of_bathroom = $request->bathrooms;
        $dt->num_of_belcony = $request->balcony;
        $dt->drawing_dining = $request->drawing_dining;
        $dt->area = $request->area;
        $dt->other_facilities = $request->facilities;
        $dt->type = $request->type;

        $dt->division_id = $request->division;
        $dt->district_id  = $request->district;
        $dt->union_id  = $request->unions;
        $dt->upazila_id = $request->upazilas;
        $dt->holding_no = $request->holding;
        $dt->google_location  = $request->google_location;

        // if ($request->file('image_file')) {

        //     foreach ($request->file('image_file') as $image_file) {

        //         // $path = $image_file->store('image_file', 's3');
        //         // $path_arr[] = $path;
        //         // Storage::disk('s3')->setVisibility($path, 'public');

        //         // ///////////
        //         $file = $image_file;
        //         $Ext = $file->getClientOriginalExtension();
        //         $file_path = public_path('image/flat_img/');
        //         $iName[] = date('YmdHis') . "." . $Ext;
                
        //         $file->move($file_path, $iName);
        //     }

        //     // $all_video_file = json_encode($path_arr);
        //     // $dt->video = $all_video_file;

        //     $all_video_file = json_encode($iName);
        //     $dt->image = $all_video_file;
        // }

        if ($request->file('image_file')) {

            foreach ($request->file('image_file') as $gallery_photo) {

             

                $file = $gallery_photo;
                $fileName = $file->getClientOriginalName();
                $Ext = $file->getClientOriginalExtension();
                
                $file_path = public_path('image/flat_img/');
                
                //$iName = date('YmdHis') . "." . $Ext;
                $iName = $fileName;

                $file->move($file_path, $iName);
                $filepath[] =  $iName;

            }

            // if ($request->file('image')) {
        //     $file = $request->file('image');
        //     $Ext = $file->getClientOriginalExtension();
        //     $file_path = public_path('prescription/');
        //     $iName = date('YmdHis') . "." . $Ext;
        //     $file->move($file_path, $iName);
        //     $dt->image = $iName;
        // }

            $all_video_file = json_encode($filepath);
            $dt->image = $all_video_file;
            //$dt->video = $all_video_file;
        }

        // if ($request->hasFile('image')) {
        //     $file = $request->file('profile_image');
        //     $Ext = $file->getClientOriginalExtension();
        //     $file_path = public_path('profile_img/');
        //     $iName = date('YmdHis') . "." . $Ext;
        //     $dt->profile_image = $iName;
        //     $file->move($file_path, $iName);
        // }


        if($dt->save()){

            $Tolate_id =  Tolate::where('set_bill_id', $request->set_bill_id)->where('user_id', Auth::id())->first()->id ?? '';
            if ($Tolate_id > 0) {
                $Tolate_dt = Tolate::find($Tolate_id);
            } else {
                $Tolate_dt = new Tolate;
            }
    
            $Tolate_dt->user_id = Auth::id();
            $Tolate_dt->house_info_id = $dt->id;
            $Tolate_dt->set_bill_id  = $request->set_bill_id;
            $Tolate_dt->status  = $request->status;
            $Tolate_dt->purpose = $request->purpose;
            $Tolate_dt->start_date = $request->start_date;
            $Tolate_dt->end_date  = $request->end_date;
            $Tolate_dt->price  = $request->price;
            $Tolate_dt->keyword  = $request->keyword;
            $Tolate_dt->contact_no  = $request->contact;

            if($Tolate_dt->save()){

                // $house_information_id =  UserInformation::where('user_id', Auth::id())->first()->id ?? '';
                // if ($house_information_id > 0) {
                //     $user_dt = UserInformation::find($house_information_id);
                // } else {
                //     $user_dt = new UserInformation;
                // }
        
                // $user_dt->user_id = Auth::id();
                

                // $user_dt->save();

                //return response()->json(['status'=>1, 'success'=>'New Flat has been successfully added']);

                return Redirect::to('/flat-management')->with(['success' => 'New Tolate has been successfully added','data'=>$Tolate_dt]);
                

            }
         


        }



        //return response()->json(['success'=>' saved successfully.']);
        //return response()->json(['status'=>1, 'success'=>'New Flat has been successfully added']);
    }
    }

    public function index(Request $request)

    {

     

        if ($request->ajax()) {

            $data = TblSetBill::latest()->where('created_by',Auth::id())->get();
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('status', function($row){

                        $booked = User::where('flat_id',$row->id)->exists();

                        if($booked){
                            $btn = '<a    data-id="'.$row->id.'"  class="  btn-success btn-sm BooKed">    BooKed   </a>';
                        }
                        else{
                            $btn = '<a   data-id="'.$row->id.'"  class="  btn-danger btn-sm notBooked">Non Booked</a>';
                        }

                            
                            

                         return $btn;

                 })

                    ->addColumn('action', function($row){

   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBill">Update Flat</a>';

   

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteflat">Delete</a>';

    

                            return $btn;

                    })

                    ->rawColumns(['action','status'])

                    ->make(true);

        }

        

        

        return view('admin.tolate.tolate_list');

    }

    public function edit($id)

    {

       // $product = RenterPayBill::find($id);
       //dd($id);
        $product = DB::table('tolates')
            ->select('tolates.id','tolates.set_bill_id','tolates.contact_no','tolates.start_date','tolates.end_date','tolates.purpose','house_information.type','house_information.num_of_beds','house_information.num_of_bathroom','house_information.num_of_belcony','house_information.drawing_dining','house_information.image','house_information.area','house_information.other_facilities','house_information.holding_no','house_information.google_location')
            ->join('house_information','house_information.set_bill_id','=','tolates.set_bill_id')
            
            ->where('tolates.set_bill_id',$id)->first();
        //dd($product);
        return response()->json($product);

    }
}
