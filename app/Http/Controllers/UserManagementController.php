<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Alert;

class UserManagementController extends Controller
{
    public function index(){

        $user = User::all();

        return view('Admin.Settings.ManageUsers', compact('user'));
    }

    public function store(Request $request){
        
        $data = $request->all();

        $userAlready = User::all();

        $validate = Validator::make($data, [
            'Username' => 'required|regex:/^\S*$/u',
            'Email'    => 'required|email',
            'Role'     => 'required|integer'
        ]);

        if($validate->fails()):
            alert()->error('ErrorAlert', $validate->errors()->first());
            return back();
        endif;

        $arrUserAlready = array();
        foreach($userAlready as $ua):
            $arrUserAlready[] = $ua->username;
        endforeach;

        if(in_array($data['Username'], $arrUserAlready)):
            Alert::error('Error!', 'User Already create');
            return back();
        endif;

        User::create([
            'username' => strtolower($data['Username']),
            'email'    => $data['Email'],
            'role'     => $data['Role'],
            'password' => bcrypt($request->username.'1')
        ]);

        Alert::success('Success', 'Create new user success!');
        return back();
    }

    public function delete(Request $request){

        $userID = $request->id;
        
        User::where('id', '=', $userID)->delete();

        Alert::success('Success!', 'Delete User Complete');
        return back();
    }
}
