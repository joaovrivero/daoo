<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        try{
            $user = User::where('email',$request->email)->first();
            if (! $user || ! Hash::check($request->password, $user->password))
                throw new Exception('Senha incorreta');
            $response = $user->createToken($request->email)->plainTextToken;
            return response()->json(['token' => $response]);
            
        }catch(Exception $error){
            return response()->json([
                'error' =>$error->getMessage()
            ],401);
        }
    }
}
