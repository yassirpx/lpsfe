<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Formation;
use App\Models\Annee;

class FormationController extends Controller
{
    public function index()
    {
        $formations= Formation::all();
        $annees= Annee::all();
        return view('vue\formation')->with('formations',$formations)->with('annees',$annees);
    }
    public function findone(Request $request)
    {
        $id=request('id');
        $formations= Formation::all();
        $formation = $formations->find($id);
        $annees= Annee::all();
        return view('form\formation')->with('formation',$formation)->with('annees',$annees);   
    }

    public function add(Request $request)
    {   
        $request->validate( [
            'nom' => ['required'],
            'annee'=> ['required']
         ]);
         $nom=request('nom');
         $annee=request('annee');
        Formation::create([
            'nomfor' => $nom,
            'ida'=>$annee
         ]);
        
         return redirect('/formations');
    }

    public function update(Request $request)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'annee'=> ['required'],
         ]);
         $id=request('id');
         $nom=request('nom');
         $annee=request('annee');
         Formation::where('id', $id)->update([
           'nomfor' => $nom,
           'ida'=>$annee
        ]);
        return redirect('/formations');
    }
    
    public function delete(Request $request)
    {
        $id=request('id');
        Formation::destroy($id);
        return redirect('/formations');
    }
}
