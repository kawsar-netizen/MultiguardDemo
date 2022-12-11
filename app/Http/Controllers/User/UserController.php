<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function RegisterCreate(Request $request){

       $request->validate([
        'name'=>'required',
        'email'=>'required|unique:users,email',
        'password'=>'required|min:6|max:15',
        'cpassword'=>'required|same:password',
       ]);
    }
}
