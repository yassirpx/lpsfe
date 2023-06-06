<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Semestre;
use App\Models\Niveau;

use App\Models\Filiere;

class SemestreController extends Controller
{
    public function index()
    {
        $semestres= Semestre::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('vue\semestre')->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
   
    public function findone(Request $request)
    {
        $id=request('id');
        $semestres= Semestre::all();
        $semestre = $semestres->find($id);
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('form\semestre')->with('semestre',$semestre)->with('niveaux',$niveaux)->with('filieres',$filieres);
       
    }

    public function add(Request $request)
    {
       
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'niveau'=> ['required', 'numeric'],
         ]);
         $id=request('id');
         $nom=request('nom');
         $niveau=request('niveau');
        Semestre::create([ 
        'nomsem' => $nom,
        'idn'=>$niveau]);
        return redirect('/semestres');
        // ........................
    }

    public function update(Request $request)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'niveau'=> ['required', 'numeric'],
         ]);

       
         $id=request('id');
         $nom=request('nom');
         $niveau=request('niveau');
         Semestre::where('id', $id)->update([
           'nomsem' => $nom,
           'idn'=>$niveau
        ]);
        return redirect('/semestres');
    
    }
    public function delete(Request $request)
    {
        $id=request('id');
        Semestre::destroy($id);
        return redirect('/semestres');
    }
}
