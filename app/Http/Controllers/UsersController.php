<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Mockery\Exception;

class UsersController extends Controller
{
    //
    public function RegisterUser(Request $request){
        try{
            $user = new User();
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->name = $request->name;
            $user->tipe = $request->tipe;
            $user->save();
            return response()->json(['code' => 'SUCCESS','message' => 'register success', 'content' => 'null']);
        }catch (Exception $e){
            return response()->json(['code' => 'Failure','message' => 'register fail', 'content' => 'null']);
        }
    }

}
