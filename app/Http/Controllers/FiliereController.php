<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Formation;
use App\Models\Filiere;
use App\Models\Annee;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres= Filiere::all();
        $formations= Formation::all();
        $annees= Annee::all();
        return view('vue\filiere')->with('filieres',$filieres)->with('formations',$formations)->with('annees',$annees);
    }
    
   
    public function findone(Request $request)
    {
        $id=request('id');
        $filieres= Filiere::all();
        $filiere = $filieres->find($id);
        $formations= Formation::all();
        $annees= Annee::all();
        return view('form\filiere')->with('filiere',$filiere)->with('formations',$formations)->with('annees',$annees);
       
    }

    public function add(Request $request)
    {
       
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'formation'=> ['required', 'numeric'],
         ]);
         $nom=request('nom');
         $formation=request('formation');
        Filiere::create([
            'nomfil' => $nom,
            'idfor'=>$formation
         ]);
        
         return redirect('/filieres');
    }

    public function update(Request $request)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'formation'=> ['required', 'numeric'],
         ]);
       
         $id=request('id');
         $nom=request('nom');
         $formation=request('formation');
         Filiere::where('id', $id)->update([
           'nomfil' => $nom,
           'idfor'=>$formation
        ]);
        return redirect('/filieres');
    
    }
    public function delete(Request $request)
    {
        $id=request('id');
        Filiere::destroy($id);
        return redirect('/filieres');
    }
}


