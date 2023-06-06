<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Element;
use App\Models\Module;
use App\Models\Professeur;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Semestre;

class ElementController extends Controller
{
    public function index()
    {
        $Elements= Element::all();
        $semestres= Semestre::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        $modules= Module::all();
        $professeurs= Professeur::all();
        return view('vue\element')->with('elements',$Elements)->with('modules',$modules)->with('professeurs',$professeurs)->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
   
    public function findone(Request $request)
    {
        $elements= Element::all();
        $id=request('id');
        $element = $elements->find($id);
        $semestres= Semestre::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        $modules= Module::all();
        $professeurs= Professeur::all();
        return view('form\element')->with('element',$element)->with('modules',$modules)->with('professeurs',$professeurs);
       
    }

    public function add(Request $request)
    {
       
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'modul'=> ['required', 'numeric'],
            'prof'=>['required', 'numeric']
         ]);
         
            $nom=request('nom');
         $prof=request('prof');
         $modul=request('modul');
        Element::create([
            'nomelement' => $nom,
            'idm'=> $modul,
            'idp'=>$prof
        ]);
        
        return redirect('/elements');
    }

    public function update(Request $request)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'modul'=> ['required', 'numeric'],
            'prof'=>['required', 'numeric']
        ]);
         $id=request('id');
         $nom=request('nom');
         $prof=request('prof');
         $modul=request('modul');
         Element::where('id', $id)->update([
           'nomelement' => $nom,
           'idm'=> $modul,
           'idp'=>$prof
        ]);
        return redirect('/elements');
    }
    public function delete(Request $request)
    {
        $id=request('id');
        Element::destroy($id);
        return redirect('/elements');
    }
}
