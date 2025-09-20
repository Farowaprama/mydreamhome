<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Auth;
use Socialite;
use App\User;
use DB;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    protected function authenticated()
    {
        if (Auth::user()->usertype == 'guser') {
            return redirect('/health.survey');
        }

        return redirect('/home');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(Request $req, $provider)
    {
        //dd($req);
        $user_type  = $req->user_type;
        $req->session()->put('user_type', $user_type);
        return Socialite::driver($provider)->redirect();
    }

    // public function redirectToProvider()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function redirectToProviderWithUserType($val)
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {

        //session()->put('user_type', 'landlord');
        
        $user_type = session()->get('user_type');
        session()->forget('user_type');
        

        $user = Socialite::driver($provider)->user();
        //dd($user);
        //exit;
        // return 1;
        $findUser = User::where('username', $user->email)->first();
        if ($findUser) {
            Auth::login($findUser);

            if ($findUser->usertype == 'Student' || $findUser->usertype == 'Authority' || $findUser->usertype == 'Parent' || $findUser->usertype == 'Teacher') {

                return Redirect::to('home');
            } else {
                return Redirect::to('dashboard');
            }
        } else {

            $dt = new User;
            $dt->name = $user->name;
            $dt->firstname = $user->user['given_name'];
            $dt->lastname = $user->user['family_name'];
            $dt->email = $user->email;
            $dt->username = $user->email;
            $dt->usertype = $user_type;
            $dt->photo = $user->avatar_original ?? '';
            $dt->register_with = $provider;
            $is_unique = false;
            $token = false;
            while (!$is_unique) {
                $token = rand(100000, 999999);
                $qry = User::where("token", $token)->first();
                if (empty($qry)) {
                    $is_unique = true;
                }
            }

            $dt->password = Hash::make($token);

            $dt->save();

            $role_id = DB::table('roles')->where('name', $user_type)->first();
            //dd($role_id);
            if (isset($role_id->id)) {
                $dt->assignRole($role_id->id);
            }

            Auth::login($dt);
            if ($user_type == 'Student' || $user_type == 'Authority' || $user_type == 'Parent' || $user_type == 'Teacher') {

                return Redirect::to('home');
            } else {
                return Redirect::to('dashboard');
            }
        }
    }

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        $user = Socialite::driver('google')->user();

        $findUser = User::where('username', $user->email)->first();
        if ($findUser) {
            Auth::login($findUser);
            return Redirect::to('/');
        } else {

            $dt = new User;
            $dt->name = $user->name;
            $dt->firstname = $user->user['given_name'];
            $dt->lastname = $user->user['family_name'];
            $dt->email = $user->email;
            $dt->username = $user->email;
            $dt->usertype = 'Student';
            $dt->register_with = 'google';
            $is_unique = false;
            $token = false;
            while (!$is_unique) {
                $token = rand(100000, 999999);
                $qry = User::where("token", $token)->first();
                if (empty($qry)) {
                    $is_unique = true;
                }
            }

            $dt->password = Hash::make($token);

            $dt->save();
            $role_id = DB::table('roles')->where('name', 'Student')->first();

            if (isset($role_id->id)) {
                $dt->assignRole($role_id->id);
            }
            Auth::login($dt);
            return Redirect::to('/');
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}
