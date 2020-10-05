<?php

namespace App\Http\Controllers\admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function getLoginForm(){
        return view("admin.login");
    }
    public function checkLogin(Request $request){
        return view("admin.login");
    }

}
