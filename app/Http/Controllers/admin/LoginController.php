<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    }

    
    public function postLogin(Request $request){
        if($request->remember = 'Remember Me'){
            $remember = true;
        }else{
            $remember = false;
        }
        $arr = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($arr,$remember)){
           return redirect()->intended('admin/home');
        }else{
            return back()->withInput()->with('error','Tài khoản hoặc mật khẩu không chính xác'); 
        }
    }

}
