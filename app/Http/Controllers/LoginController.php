<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        // validasi data
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        try{
            $akun = $request->only('username','password');
            if(Auth::attempt($akun)){
                $AuthUser = Auth::user();
                return redirect() -> route('login.motor.index');
            } else {
                return redirect() -> route('login.index') -> with(['error' => 'Wrong username or password!']);
            }
        }catch(QueryException $e){
            return redirect() -> route('login.index') -> with(['error' => $e->errorInfo]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
