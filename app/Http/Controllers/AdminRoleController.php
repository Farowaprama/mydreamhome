<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Event;
use Validator;
use Auth;
// use App\Traits\EmailSend;
use App\AssignJudgeToEvent;
// use App\Traits\SmsSendTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;

class AdminRoleController extends Controller
{
    // use EmailSend, SmsSendTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::where('usertype','Admin')->get();
        $users = User::where('usertype','landlord')->get();
        //dd($users);
        return view('admin.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::all();
        //dd($roles);
        // $events=Event::where('date', '>=', date('Y-m-d'))->where('status',1)
        //$events=Event::where('date', '>=', date('m/d/Y'))->where('status',1)->orderBy('date')->get();
        //dd($events);
        return view('admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            // 'usertype' => 'required|max:50',
            'username' => 'required|max:20|unique:users',
            'mobile' => 'required|numeric|unique:users',
            'email' => 'required|max:100|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create New User
        $user = new User();
        $user->firstname = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->mobile = $request->mobile;
        $user->usertype = 'Admin';
        $pass = $request->password;
        $user->password = Hash::make($request->password);
        $user->save();

        // if(!empty($request->events) && count($request->events)>0){

        //     foreach ($request->events as $event_id) {
        //         $event_assign= new AssignJudgeToEvent();
        //         $event_assign->event_id=$event_id;
        //         $event_assign->judge_id= $user->id;
        //         $event_assign->type= $request->roles;
        //         $event_assign->save();
        //     }

        // }


        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        // $subject = "Kambaii User Details";
        // $content = "
        // <div style='width: 95%; border-bottom: 1px solid #349791'>
        //     <div style='padding:15px'>
        //         <p>Hi ".$request->name.", Now you are connected with kambaii platform.<br>Your User deatils is:<br>
        //         <strong>Username: ".$request->username."</strong><br>
        //         <strong>Password: ".$pass."</strong><br></p><br>
        //         <p>Regards<br>Kambaii Support Team</p>
        //     </div>
        // </div>";

        // if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
        //     $mail_result=sengrid_mail_sender($request->email,$subject,$content);
        // }elseif(strlen($request->mobile)>10 && is_numeric($request->mobile)){
        //    $send_msg="ধন্যবাদ। আপনি বিচারক হিসেবে ক্যাম্বাই ইনোভেশনে যুক্ত হয়েছেন। আপনার ইউজার নেম: ".$request->username." এন্ড পাসওয়ার্ড: ".$request->password." ।";
        //    $sms_result=send_sms($request->mobile, $send_msg);


        // }

        return redirect()->route('admin_role.index')->with('success', 'User has been created !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles  = Role::all();
        $events=Event::where('date', '>=', date('m/d/Y'))->where('status',1)->orderBy('date')->get();
        return view('admin.edit', compact('user', 'roles','events'));
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
        // Create New User
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|max:20|unique:users,username,' . $id,
            'mobile' => 'required|numeric|unique:users,mobile,' . $id,
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->mobile = $request->mobile;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        if(!empty($request->events) && count($request->events)>0){

            $event_delete=AssignJudgeToEvent::where("judge_id",$user->id)->delete();
            foreach ($request->events as $event_id) {
                $event_assign= new AssignJudgeToEvent();
                $event_assign->event_id=(int)$event_id;
                $event_assign->judge_id= $user->id;
                $event_assign->type= $request->roles??"";
                $event_assign->save();

            }

        }

        session()->flash('success', 'User has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}
