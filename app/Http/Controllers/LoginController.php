<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    //
    public function Login(Request $request)
    {
        // grab credentials from the request
        $credentials = $request->only('email', 'password');
//        dd($credentials);
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        $user = User::where('email',$request->only('email'))->first();
        $nama = $user->nama;
        $tipe = $user->tipe;
        $id = $user->id;

        return response()->json(['status'=>'SUCCESS','message'=>'ok','content'=>['token'=>$token,'tipe'=>$tipe,'nama'=>$nama,'id'=>$id]]);
    }


}
