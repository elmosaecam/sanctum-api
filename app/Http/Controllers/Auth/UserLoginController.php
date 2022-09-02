<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    //
    public function login(Request $request)
    {
        $mail =   $request->email;
        $password = $request->password;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
        ]);

        $user = User::where('email', $mail)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return response('Login invalid', 503);
        }

       $data = $user->createToken($request->name, ['server:update']);
        return response()->json(
            [
                'token' => $data->plainTextToken
            ]
        );
    }
}
