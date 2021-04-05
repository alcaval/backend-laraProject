<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class hospitalCont extends Controller
{
    public function getHo(Request $request, $id){
        $count = Hospital::All()->count();
        if($count > 0){
            $hos = Hospital::where('id', '=',  );
            return response()->json($hos);
        }else{
            return response()->json("Historiales Not Found");
        }
    }

    public function getHos(){
        $count = Hospital::All()->count();
        if($count > 0){
            $hos = Hospital::All();
            return response()->json($hos);
        }else{
            return response()->json("Historiales Not Found");
        }
    }

    public function saveHos(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'cod' => 'required|string',
        ]);

        $count = Hospital::All()->count();
        if($count > 0){
            Hospital::where('id','=', $id)->update(array('name' => $request->name, 
                                                            'cod' => $request->cod,
                                                        ));
        }
    }

    public function eraseHos(Request $request, $id)
    {
        $count = Hospital::All()->count();
        if($count > 0){
            Hospital::where('id','=', $id)->delete();
        }
    }

    public function addHos(Request $request){
        $request->validate([
            'name' => 'required|string',
            'cod' => 'required|string',
        ]);

        $hos = Hospital::create([
            'name' => $request->name,
            'cod' => $request->cod,
        ]);

        

        return response()->json([
            'message' => 'Successfully created Historial!',
            'id'=> $hos->id
        ], 201);
    }
}