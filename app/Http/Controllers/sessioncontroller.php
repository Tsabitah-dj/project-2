<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use illuminate\Support\Facades\Auth;
use illuminate\Http\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class sessioncontroller extends Controller
{
    public function index(){
        return view('sesi/index');
    }
    public function login(Request $request){
        Session::flash('email',$request->email);

        $request->validate ([
        'email' => 'required',
        'password' => 'required',
        ]);

        [
           'email' => 'Email Wajib Diisi',
           'password' => 'Password Wajib Diisi',
        ];

        $infologin = [
            'email' =>$request->email,
            'password' =>$request->password
        ];
        if (Auth::attempt($infologin)){
            return redirect('layout')->with('success','Berhasil Login');
        } else {
            return redirect('sesi')->with('Eror','Username dan password tidak valid ');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('sesi')->with('succees','Berhasil Logout');
    }
}

