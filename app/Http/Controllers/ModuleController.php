<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Module;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Semestre;

class ModuleController extends Controller
{
    public function index()
    {
        $modules= Module::all();
        $semestres= Semestre::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('vue\module')->with('modules',$modules)->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
   
    public function findone(Request $request)
    {
        $id = request('id');
        $modules= Module::all();
        $module = $modules->find($id);
        $semestres= Semestre::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('form\module')->with('module',$module)->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
       
    }

    public function add(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'semestre'=> ['required', 'numeric']
         ]);
         $nom=request('nom');
         $semestre=request('semestre');
        Module::create([
            'nommodel' => $nom,
             'ids'=>$semestre
        ]);
        return redirect('/modules');
        
    }

    public function update(Request $request)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'semestre'=> ['required', 'numeric'],
         ]);
         $id = request('id');
         $nom=request('nom');;
         $semestre=request('semestre');
         Module::where('id', $id)->update([
           'nommodel' => $nom,
           'ids'=>$semestre
        ]);
        return redirect('/modules');
    }
    public function delete(Request $request)
    {
        $id = request('id');
        Module::destroy($id);
        return redirect('/modules');

    }}
