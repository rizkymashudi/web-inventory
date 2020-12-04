<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userActive;
use App\Models\User;
use App\Models\LogOnline;
use Session;
use Artisan;
use DB;
use Cache;
use Carbon;
use Alert;


class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function beforeLogin(Request $request){

        Artisan::call('route:clear'); 
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Cache::flush();
        
        $user_active = userActive::where('date_update', '<', DB::raw('DATE_SUB(NOW(), INTERVAL 60 MINUTE'))->first();
        if($user_active):
            userActive::where('date_update', '<', DB::raw('NOW() + INTERVAL 60 MINUTE'))->delete();
        endif;

        $username = $request->username;

        return view('login', compact('username'));
    }

    public function login(Request $request){

        if(Auth::attempt(['email' => $email, 'password' => $password])):
            Session::put('userID', Auth::user()->user_id);
            Session::put('username', Auth::user()->username);
            Session::put('email', Auth::user()->email);
            Session::put('pwdLogin', Auth::user()->password);
            Session::put('role', Auth::user()->role);
            Session::put('login1', TRUE);

            $email    = $request->email;
            $password = $request->password;
            $login    = User::select('user_id', 'email')->where('email', '=', $email)->first();
            $session_id = session()->getId();

            Session::put('sessionID', $session_id);
            Cache::put('user_key', $login->user_id);
            Cache::put('sessionID', $session_id);


            //save user active
            $user_active = userActive::select('user_id')->where('user_id', '=', $login->user_id)->first();

            if($user_active):
                userActive::where('user_id', '=', $user_active->user_id)->delete();
                userActive::create([
                    'user_id'       => $login->user_id,
                    'session_id'    => session()->getId(),
                    'date_login'    => Carbon::now('GMT+7'),
                    'date_update'   => Carbon::now('GMT+7'),
                    'ip'            => request()->ip()
                ]);
            
            else:
                userActive::create([
                    'user_id'       =>  $login->user_id,
                    'session_id'    =>  session()->getId(),
                    'date_login'    =>  Carbon::now('GMT+7'),
                    'date_update'   =>  Carbon::now('GMT+7'),
                    'ip'            =>  request()->ip()
                ]);
    
            endif;

            return redirect(route('Dashboard'));

        else:
            $request->email;
            Alert::error('Error', 'email or password invalid!');   
            return redirect('/');
        endif;

    
    }

    public function logout(Request $request){

        $userID_cache   =   Cache::get('user_key');
        $session_id     =   Cache::get('sessionID');
        $session_username=  Session::get('username');
        $adminActive    =   userActive::where('session_id', '=', $session_id)->where('user_id', '=', $userID_cache)->first();

        if($adminActive):
            if($session_id):

                $logout = userActive::join('web_inventory.user', 'web_inventory.user.user_id', '=', 'web_inventory.user_active.user_id')
                            ->select('web_inventory.user_active.user_id', 'web_inventory.user.username')
                            ->where('web_inventory.user_active.session_id', '=', $session_id)
                            ->first();

                userActive::where('session_id', '=', $session_id)->where('user_id', '=', $userID_cache)->delete();

                LogOnline::create([
                    'user_id'   =>  $userID_cache,
                    'action_id' =>  2,
                    'desc'      =>  'user '.$session_username. 'log out',
                    'datetime'  =>  Carbon::now('GMT+7'),
                    'ip'        =>  request()->ip()
                ]);
                
            endif;
        endif;

    }
}
