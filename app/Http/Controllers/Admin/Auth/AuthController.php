<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class AuthController extends Controller
{
    //
    public function getLogin(){
        return view("backend/login");
    }
    public function postLogin(LoginRequest $loginRequest){
    
        if(Auth::attempt(['email' => $loginRequest->email, 'password' => $loginRequest->password])){
            // $request->session()->put("email",$request->email);
            return redirect("/admin");
        }else{
            
            return redirect()->back()->withInput()->withErrors("Tài khoản không hợp lệ");
        }
    }
}
