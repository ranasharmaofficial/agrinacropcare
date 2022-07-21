<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{       
    public function login(){
        return view('dashboard.auth.login');
    }

    public function loginDash(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $dashInfo = User::where('user_id', '=', $request->username)->first();
        if (!$dashInfo) {
            return redirect()->route('dashboard.auth.login')->with(session()->flash('alert-warning', 'Failed! We do not recognize your username.'));
        } else if ($request->password === $dashInfo->password) {
            $request->session()->put('LoggedDash', $dashInfo->id);
            return redirect('dashboard/home');
        } else {
            return redirect()->route('dashboard.auth.login')->with(session()->flash('alert-danger', 'Failed! Incorrect Password.'));
        }
    }

    public function dashLogout()
    {
        if (session()->has('LoggedDash')) {
            session()->pull('LoggedDash');
            return redirect('dashboard/auth/login');
        }
    } 
    
    public function forgetPassword(){
        return view('dashboard.auth.forget-password');
    }    

    public function home()
    {
        return view('dashboard.home');
    }
    public function cropCare(){
        return view('dashboard.cropcare');
    }
    public function animalHealthCare(){
        return view('dashboard.animalhealthcare');
    }
    public function insurance(){
        return view('dashboard.insurance');
    }
}