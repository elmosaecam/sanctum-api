<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{


    public function register(Request $request){

        if(!User::where($request->all())->first()){

            User::create([
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'name'=>$request->name,
            ]);
            return response()->json(['message'=>'successed']);
        }
        return response()->json(['message'=>'user  is exists !']);
    }

}
