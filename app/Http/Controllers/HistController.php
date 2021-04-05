<?php

namespace App\Http\Controllers;
use App\Models\Historial;
use Illuminate\Http\Request;

class HistController extends Controller
{
    public function historial(Request $request)
    {
        return response()->json($request->historial());
    }

    public function getHistoriales(){
        $count = Historial::All()->count();
        if($count > 0){
            $hist = Historial::All();
            return response()->json($hist);
        }else{
            return response()->json("Historiales Not Found");
        }
    }

    public function getHistorial(Request $request, $id){
        $count = Historial::All()->count();
        if($count > 0){
            $hist = Historial::where('user','=', $id)->get();
            return response()->json($hist);
            //return $id;
        }else{
            return response()->json("Historiales Not Found");
        }
    }

    public function getH($id){
        $count = Historial::All()->count();
        if($count > 0){
            $hist = Historial::where('user','=', $id)->get();
            return $hist;
            //return $id;
        }else{
            return response()->json("Historiales Not Found");
        }
    }

    public function saveHistorial(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string',
            'cod' => 'required|string',
            'loc' => 'required|string',
            'fIngreso' => 'required|date',
            'fAlta' => 'required|date',
            'fReingreso' => 'required|date',
            'edad' => 'required|string',
            'sexo' => 'required|string',
            'tipo' => 'required|string',
            'NDA' => 'required|string',
            'NPA' => 'required|string',
            'user' => 'required|string'
        ]);

        $count = Historial::All()->count();
        if($count > 0){
            Historial::where('id','=', $id)->update(array('titulo' => $request->titulo, 
                                                            'cod' => $request->cod,
                                                            'loc' => $request->loc,
                                                            'fIngreso' => $request->fIngreso,
                                                            'fAlta' => $request->fAlta,
                                                            'fReingreso' => $request->fReingreso,
                                                            'edad' => $request->edad,
                                                            'sexo' => $request->sexo,
                                                            'NDA' => $request->NDA,
                                                            'NPA' => $request->NPA,
                                                            'tipo' => $request->tipo));
        }
    }

    public function eraseHistorial(Request $request, $id)
    {
        $count = Historial::All()->count();
        if($count > 0){
            Historial::where('id','=', $id)->delete();
        }
    }

    public function addHistorial(Request $request){
        $request->validate([
            'titulo' => 'required|string',
            'cod' => 'required|string',
            'loc' => 'required|string',
            'fIngreso' => 'required|date',
            'fAlta' => 'required|date',
            'fReingreso' => 'required|date',
            'edad' => 'required|string',
            'sexo' => 'required|string',
            'tipo' => 'required|string',
            'NDA' => 'required|string',
            'NPA' => 'required|string',
            'user' => 'required|string'
        ]);

        $hist = Historial::create([
            'titulo' => $request->titulo,
            'cod' => $request->cod,
            'loc' => $request->loc,
            'fIngreso' => $request->fIngreso,
            'fAlta' => $request->fAlta,
            'fReingreso' => $request->fReingreso,
            'edad' => $request->edad,
            'sexo' => $request->sexo,
            'tipo' => $request->tipo,
            'NDA' => $request->NDA,
            'NPA' => $request->NPA,
            'user' => $request->user,
        ]);

        return response()->json([
            'message' => 'Successfully created Historial!', 'id'=> $hist->id
        ], 201);
    }
}
