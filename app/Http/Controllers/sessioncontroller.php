<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){
        return view('sesi/index');
    }
    
    public function login(Request $request){
        Session::flash('email', $request->email);

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)){
            return redirect()->route('Dashboard')->with('success', 'Berhasil Login');
        } else {
            return redirect('sesi')->with('error', 'Username dan password tidak valid');
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }
}
