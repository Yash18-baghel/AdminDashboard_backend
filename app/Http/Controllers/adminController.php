<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    function Register(Request $req){
       try{
        $Admin = new Admin;
        $Admin->name = $req->input('name');
        $Admin->email = $req->input('email');
        $Admin->password = Hash::make($req->input('password'));
        $Admin->save();
       }
       catch(Exception $e){
        return [FALSE,$e];  
       }
        return [TRUE,$Admin];
    }
    function Login(Request $req){

        $Admin = Admin::where('email',$req->email)->first();
        if(!$Admin ||!Hash::check($req->password,$Admin->password) )
        {
            return [FALSE,NULL];
        }
        return [TRUE,$Admin];
    }
}
