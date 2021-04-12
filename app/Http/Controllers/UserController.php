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

    public function edit(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'cod' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $count = User::All()->count();
        if($count > 0){
            User::where('id','=', $id) -> update(array('name' => $request->name,
                                                    'surname' => $request->surname,
                                                    'cod' => $request->cod,
                                                    'email' => $request->email,
                                                    'password' => bcrypt($request->password)));
        }

        return response()->json([
            'message' => 'Successfully edited user!'
        ], 201);
    }
}
