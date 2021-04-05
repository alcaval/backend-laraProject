<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(){
        $count = User::All()->count();
        if($count > 0){
            $users = User::All();
            return response()->json($users);
        }else{
            return response()->json("Users Not Found");
        }
    }

    public function getUser($u){
        $count = User::All()->count();
        if($count > 0){
            return response()->json(User::where('email', '=', $u));
        }else{
            return response()->json("User Not Found");
        }
    }

    public function eraseU(Request $request, $id)
    {
        $count = User::All()->count();
        if($count > 0){
            User::where('id','=', $id)->delete();
        }
    }
}
