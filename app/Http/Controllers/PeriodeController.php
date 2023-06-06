<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periode;
use App\Models\Semestre;
use App\Models\Element;
use App\Models\Niveau;
use App\Models\Filiere;


class PeriodeController extends Controller
{
    public function index()
    {
        $periodes= Periode::all();
        $semestres= Semestre::all();
        $Elements= Element::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('vue/periode')->with('periodes',$periodes)->with('elements',$Elements)->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
   
    public function findone(Request $request)
    {
        $periodes= Periode::all();
        $id=request('id');
        $periode = $periodes->find($id);
        $semestres= Semestre::all();
        $Elements= Element::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('form/periode')->with('periode',$periode)->with('elements',$Elements)->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
       
    }

    public function add(Request $request)
    {
       
        $request->validate( [
            'debutperi' => ['required', 'string', 'max:255'],
            'finperi' => ['required', 'string', 'max:255'],
            'element'=> ['required', 'numeric'],
            'semestre'=> ['required', 'numeric'],
         ]);
        

            $debutperi=request('debutperi');
            $finperi=request('finperi');
            $ids=request('semestre');
            $idele=request('element');

        Periode::create([
        'debutperi' => $debutperi ,
        'finperi'=>$finperi ,
        'ids'=>  $ids,
        'idele'=>  $idele,


        
    ]);
    return redirect('/periodes');
    //    ......................................
    }

    public function update(Request $request)
    {
        $request->validate( [
            'debutperi' => ['required', 'string', 'max:255'],
            'finperi' => ['required', 'string', 'max:255'],
            'element'=> ['required', 'numeric'],
            'semestre'=> ['required', 'numeric'],
         ]);

        
         $id=request('id');
         $debutperi=request('debutperi');
         $finperi=request('finperi');
         $ids=request('semestre');
         $idele=request('element');

         Periode::where('id', $id)->update([
            'debutperi' => $debutperi ,
            'finperi'=>$finperi ,
            'ids'=>  $ids,
            'idele'=>  $idele,
        ]);
        return redirect('/periodes');
        // .................................
    
    }
    public function delete(Request $request)
    {
        $id=request('id');
         Periode::destroy($id);
         return redirect('/periodes');
    }
}
