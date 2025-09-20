<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use DataTables;

use Auth;
use File;
use DB;

use App\Models\User;
use App\Models\TblSetBill;
use App\Models\UserInformation;
use Validator;

use App\Traits\EmailSend;

class UserController extends Controller
{

    use EmailSend ;
    
    public function StoreRegistration(Request $req){
       // dd($req);
        $usertype = $req->usertype;
        $username = $req->username;

        $cq = User::where("mobile", $req->mobile)->exists();


        if($cq){
            return $this->success_error(true, "<strong>".$req->mobile."</strong> already exist in server!", "");
        }
        elseif (!empty($req->email)) {

            $cq_email = User::where("email", $req->email)->exists();

            if($cq_email){
                return $this->success_error(true, "<strong>Email </strong>Address already exist in server!", "");
            }
            elseif(!filter_var($req->email, FILTER_VALIDATE_EMAIL)) {
                return $this->success_error(true, "<strong>Email </strong>Address Is Not Valid!", "");
            }

        }
        elseif (Strlen($req->mobile)!=11) {
            return $this->success_error(true, "<strong>Mobile </strong>Number Is Not Valid!", "");
        }


        //save data to institution table
        $is_unique = false;
        $token = false;
        while(!$is_unique){
            $token = rand(100000,999999);
            $qry = User::where("token",$token)->first();
            if(empty($qry)){
                $is_unique = true;
            }
        }
        $dt = new User;

        $dt->firstname = $req->firstname;
        $dt->lastname = $req->lastname;
        $dt->mobile = $req->mobile;
        $dt->email = $req->email;
        $dt->usertype = $req->usertype;

        if(isset($req->landlord_id)){
         $dt->landlord_id = $req->landlord_id;
        }
        

        $dt->username = $username;
        $dt->password = Hash::make($req->password);

        $dt->token = $token;
        $dt->token_pass = $req->password;

        if($dt->save()){

            if(Auth::attempt(['username' => $username, 'password' => $req->password])){
                $user = Auth::user();
            }

                return $this->success_error(false, 'Registration successful, please wait, redirecting you to dashboard.', $req->firstname);

        }else{
            return $this->success_error(true, "Unable to register right now.", dd($dt));
        }
    }

 

    public function store(Request $req){

        $validator = Validator::make($req->all(), [
            //'flat_no' => 'required|unique:tbl_set_bills|max:255',
            'flat_id'=>[\Illuminate\Validation\Rule::unique('users')->where(function ($query) use ($req) {
                $q = $query
                    ->where('flat_id', $req->flat_id)
                    ->where('landlord_id', auth()->user()->id)
                    ->where('id', '!=', $req->user_id);
                return $q;
            }),
                'required',
            ],
            'firstname' => 'required',
            'lastname' => 'required',
          
            //'mobile' => 'required|unique:users|max:11',
            'mobile'=>[\Illuminate\Validation\Rule::unique('users')->where(function ($query) use ($req) {
                $q = $query
                    ->where('mobile', $req->mobile)
                    //->where('landlord_id', auth()->user()->id)
                    ->where('id', '!=', $req->user_id);
                return $q;
            }),
                'required',
            ],
            'password' => 'required',
            'username' => 'required',
           
        ]);
        
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
       //dd($req);
       $usertype = $req->usertype;
       $username = $req->username;


       if (isset($req->user_id))
       {

        $dt = User::find($req->user_id);

       }
       else{

        $cq = User::where("username", $username)->exists();


        if($cq){
            return $this->success_error(true, "<strong>".$username."</strong> already exist in server!", "");
        }
        elseif (!empty($req->email)) {
 
            $cq_email = User::where("email", $req->email)->exists();
 
            if($cq_email){
                return $this->success_error(true, "<strong>Email </strong>Address already exist in server!", "");
            }
            elseif(!filter_var($req->email, FILTER_VALIDATE_EMAIL)) {
                return $this->success_error(true, "<strong>Email </strong>Address Is Not Valid!", "");
            }
 
        }
        elseif (Strlen($req->mobile)!=11) {
            return $this->success_error(true, "<strong>Mobile </strong>Number Is Not Valid!", "");
        }
 
 
        //save data to institution table
        $is_unique = false;
        $token = false;
        while(!$is_unique){
            $token = rand(100000,999999);
            $qry = User::where("token",$token)->first();
            if(empty($qry)){
                $is_unique = true;
            }
        }
        $dt = new User;

        $dt->password = Hash::make($req->password);

       $dt->token = $token;
       $dt->token_pass = $req->password;

        }

      

       $dt->firstname = $req->firstname;
       $dt->lastname = $req->lastname;
       $dt->mobile = $req->mobile;
       $dt->email = $req->email;
       $dt->usertype = $req->usertype;

       if(isset($req->landlord_id)){
        $dt->landlord_id = $req->landlord_id;
       }

       if(isset($req->flat_id)){
        $dt->flat_id = $req->flat_id;
       }
       

       $dt->username = $username;
       

       if($dt->save()){

                $subject = "Renter Invitation";
                $email = $req->email;
                $name = $req->firstname." ".$req->lastname;
                $cont = "
                <div style='width: 95%; border-bottom: 1px solid #349791'>
                    <div style='padding:15px'>
                        <p>Hi ".$name.", <br>". Auth::user()->firstname ." ". Auth::user()->lastname ." wants to enlist you as his Renter. Your Username: ".$req->username." & Password: ".$req->password."  <a href='https://smarthome.com/login'>Click here</a> to login your panel and accept the invitation.</p>
                        <p>Regards<br>Dream Home Admin</p>
                    </div>
                    <div style='width: 95%; color: #349791; padding: 10px;'>
                        <table>
                            <tr>
                                <td>
                                    <img src='http://127.0.0.1:8000/assets/img/logo.png' style='width: 100px; float: left; margin-right: 15px'>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>";
            

                if(filter_var($dt->email, FILTER_VALIDATE_EMAIL) && $dt->email==$req->email){
                
                    $empemail = $this->sendmail_sendgrid($cont,$name,$email,$subject);
                    //dd($empemail);
                    //return $this->success_error(false, 'Security code sent in your email.', '');
                }

               //return $this->success_error(false, 'Registration successful, please wait, redirecting you to dashboard.', $req->firstname);
               return response()->json(['success'=>'Registration successful, please wait, redirecting you to dashboard.']);
       }else{
          // return $this->success_error(true, "Unable to register right now.", dd($dt));
           return response()->json(['success'=>'Unable to register right now']);
       }
    }
   }

    public function AddRenter_old(Request $req){

        return view('admin.renter_add');
    }

    public function ProfileView(Request $req, $id="NULL"){
        $id = $id != "NULL" ? $id : Auth::id();
         $data = DB::table('users')
            ->select('users.id','users.firstname','users.lastname','users.mobile','users.email','users.username','users.created_at','user_information.id as information_id','user_information.designation','user_information.present_address','user_information.permanent_address','user_information.date_of_birth','user_information.gender','user_information.nid_image','user_information.profile_image','user_information.house_name','user_information.location','user_information.holding_no','user_information.logo','user_information.sign_image')
            ->leftjoin('user_information','user_information.user_id','=','users.id')
            ->where('users.id',$id)
            ->first();

        //dd($data);

        
        //dd($id);
       // $data = User::where('id', $id)->first();
        //dd($data);

        return view('admin.profile_view', compact('data'));
    }

    public function ProfileUpdate(Request $request){
   //dd($request->file('profile_image'));sign_image

        

        

        // if(!empty($request->user_id)){
    
        // $renterpay2 = User::updateOrCreate([

        //     'id' => $request->user_id

        // ],

        // [
        //     "firstname" => $request->firstname,
        //     "lastname" => $request->lastname,
        //     "email" => $request->email,
        //     "mobile" => $request->mobile,
        // ]);  
        // }
        
        $renterpay = UserInformation::updateOrCreate([

            'id' => $request->information_id

        ],

        [
            "user_id" => $request->user_id,
            "designation" => $request->designation,
            "present_address" => $request->present_address,
            "permanent_address" => $request->permanent_address,
            "date_of_birth" => $request->date_of_birth,
            "gender" => $request->gender,
            "house_name" => $request->house_name,
            "location" => $request->location,
            "holding_no" => $request->holding_no,
           
         

        ]);        


        if ($request->information_id > 0) {
            $dt = UserInformation::find($request->information_id);
        } else {
            $dt = new UserInformation;
        }

        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $Ext = $file->getClientOriginalExtension();
            $file_path = public_path('profile_img/');
            $iName = date('YmdHis') . "." . $Ext;
            $dt->profile_image = $iName;
            $file->move($file_path, $iName);
        }

        if ($request->hasFile('sign_image')) {
            $file = $request->file('sign_image');
            $Ext = $file->getClientOriginalExtension();
            $file_path = public_path('profile_img/');
            $iName = date('YmdHis') . "." . $Ext;
            $dt->sign_image = $iName;
            $file->move($file_path, $iName);
        }

        $dt->save();

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
    public function ProfileUpdate1(Request $req , $id="NULL"){
       
        return view('admin.profile_update');
    }

    public function RenterList_old(Request $req, $id="NULL"){

        

        if(isset($id)){
            $data = User::select('id','landlord_id','firstname','lastname','email','mobile','username','created_at')
            ->where('landlord_id', $id)->orderBy('id', 'DESC')->get();
        }
        else{

            $data = User::select('id','landlord_id','firstname','lastname','email','mobile','username','created_at')
            ->orderBy('id', 'DESC')->get();

        }

        return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('status', function($row){

   

                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm set_bill">Set Bill</a>';



                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm pay_bill">Pay Bill</a>';

 

                         return $btn;

                    })

                    ->addColumn('action', function($row){

   

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editUser">Edit</a>';

   

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteUser">Delete</a>';

    

                            return $btn;

                    })

                    ->rawColumns(['action','status'])

                    ->make(true);

                    return view('admin.renter_list');
        //dd($data);
        //return view('admin.renter_list', compact('data'));
    }

   
    public function myLogin(Request $req){
        //dd($req);
        if(Auth::attempt(['username' => $req->username, 'password' => $req->password])){

            $user =  Auth::user();

        //     $check_role= DB::table('model_has_roles')->where('model_id',$user->id)->exists();
        //    if(!$check_role){

        //       $role_id=DB::table('roles')->where('name',$user->usertype)->first();

        //        is_numeric($role_id)?$user->assignRole($role_id):'';
        //    }
           //$utype=$req->utype;

           //dd($user);
            return $this->success_error(false, 'Login Successful, please wait ....', $user);
        } else {
            return $this->success_error(true, "Your credentials not matched ! Try again.", "");
        }
    }

    // ////////////
    public function newPswdSet(Request $req){

        $cq = User::where("email", $req->email)->where("token", $req->sCode)->exists();
        if(!$cq){
            return $this->success_error(true, 'Email and security code combination not match', '');
        } else {
            $dt = User::where("email", $req->email)->where("token", $req->sCode)->first();
            $dt = User::find($dt->id);
            $dt->password = bcrypt($req->password);
            if($dt->save()){
                return $this->success_error(false, 'Your password successfully changed.', '');
            } else {
                return $this->success_error(true, 'Unable to change your password.', '');
            }
        }
    }

    public function passwordReset(Request $req){
        //dd($req->username);

        //$cq = User::where("username", $req->email)->exists();
        $cq_email = User::where("email", $req->email)->exists();

        if(!$cq_email){
            return $this->success_error(true, $req->email.' does not exist in server.', '');
        } 
        else {
            $rand = rand(100000, 999999);

            $dt = User::where("email", $req->email)->first();
            if(!isset($dt->email) && empty($dt->email)){
                $dt = User::where("email", $req->email)->first();
            }
            $dt->token = $rand;

            if($dt->save()){

                $subject = "Password Reset Request";
                $content = "
                <div style='width: 95%; border-bottom: 1px solid #349791'>
                    <div style='padding:15px'>
                        <p>Hi ".$dt->name.", your Dream Home security code is - ".$rand."</p><br>
                        <p>Regards<br>Dream Home Support Team</p>
                    </div>
                </div>";

                if(filter_var($dt->email, FILTER_VALIDATE_EMAIL) && $dt->email==$req->email){
                    
                    $mail_result=$this->sendmail_sendgrid($content, $dt->name, $dt->email, $subject);
                    //dd($mail_result);
                    return $this->success_error(false, 'Security code sent in your email.', '');
                }else if(strlen($dt->mobile)==11 && is_numeric($dt->mobile) && $dt->mobile==$req->email){

                    $sms_msg="Your Dream Home OTP Code-".$rand;
                    //dd($dt->mobile);
                    $sms_result=send_sms($dt->mobile,$sms_msg);
                    //$sms_result=send_sms($req->mobile,$send_msg);
                    return $this->success_error(false, 'Security code sent in your mobile.', '');
                }else{
                    return $this->success_error(true, "mobile or email is not valid!", '');
                }

            } else {
                return $this->success_error(true, 'Unable to send security code.', '');
            }
        }
    }

    public function store_change_password(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return Redirect::to('/login')->with(['success' => 'Password changed successful.']);

        

        
    }
    public function change_password($type=false)
    {
        if ($type == "innovation") {
            return view('users.change_password_innovator');
        }
        return view('user_dashboard.users.change_password');
        
    }
    // ///////////////

    public function userApproveOrDelete(Request $request)
    {


        try {
            if ($request->type == "delete") {

                $user = User::findOrFail($request->id);

                if ($user->usertype == "School_Participant") {
                    $idea = NewParticipantInformation::where('user_id', $user->id);
                    if ($idea->delete()) {
                        $data = $user->delete();
                        $msg = 'User Deleted Successfully';
                    } else {
                        $data = $user->delete();
                        $msg = 'User Deleted Successfully';
                    }
                } else {
                    $data = User::where('id', $request->id)->delete();
                    $msg = 'User Deleted Successfully';
                }
            } elseif ($request->type == 1) {

                $data = User::find($request->id);
                $data->status = 1;
                //$data->action_by = Auth::user()->id;
                $data->update();
                $msg = 'User Approved Successfully';

                // $cont = 'Dear ' . $data->name . '<br> Your Dream Home ' . $data->usertype . ' account is approved.Now, You can do your activity on our platform.Thanks for registration.<a href="http://dreamhome.com/">here</a>.<br><br>Regards,<br>Support Team, Dream Home';

                // $subject = "Dream Home - User Approved Successfully";
                // if (filter_var($data->email, FILTER_VALIDATE_EMAIL)) {
                //     $mail_result = sengrid_mail_sender($data->email, $subject, $cont);
                // }
                //  elseif (strlen($data->mobile) == 11) {
                //     $sms = "আপনার কাম্বাই ইনোভেশন এর বন্ধ অ্যাকাউন্ট টি সচল করা হয়েছে।";
                //     $sms_result = send_sms($data->mobile, $sms);
                // }
            } else {
                $data = User::where('id', $request->id)->update(['status' => 0]);
                $msg = 'User Re-Pending Successfully';
            }
        } catch (\Throwable $th) {
            $msg = $th->getMessage();
        }

        return response()->json([
            "status" => 1,
            "msg" =>  $msg,
            "data" => $data
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }

    public function forcelogout(Request $request)
    {
        if (Auth::guest()) {
            return redirect()->intended("login");
        }
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }

    public function success_error($err, $msg, $data){
        return response()->json([
            "error" => $err,
            "msg" => $msg,
            "data" => $data
        ]);
    }
}
