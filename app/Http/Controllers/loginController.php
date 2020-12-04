<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Artisan;


class loginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function beforeLogin(){

        Artisan::call('route:clear'); 
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Cache::flush();
        
        $login = Session::get('login');

        if($login):
            return redirect()->route('dashboard');
        endif;

        return view('login');
    }

    public function login(Request $request){


    }
}
