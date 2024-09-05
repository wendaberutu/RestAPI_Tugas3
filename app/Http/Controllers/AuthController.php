<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function index(){
        return view('login');
    }
    function loginProses(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/dashboard');
        }
        return redirect('login')->with('error', 'Email atau password salah.');
    }
    
    }

