<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Niveau;
use App\Models\Filiere;

class NiveauController extends Controller
{
    public function index()
    {
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('vue\niveau')->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
    public function calendrier()
    {
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('vue\calendrier')->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
   
    public function findone(Request $request)
    {
        $id = request('id');
        $niveaux= Niveau::all();
        $niveau = $niveaux->find($id);
        $filieres= Filiere::all();
        return view('form\niveau')->with('niveau',$niveau)->with('filieres',$filieres);
       
    }

    public function add(Request $request)
    {
       
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'filiere'=> ['required', 'numeric'],
         ]);
         $nom=request('nom');
         $filiere=request('filiere');
        Niveau::create([ 
        'nomniveau' => $nom,
        'idfil'=>$filiere]);

        return redirect('/niveaux');
        // ................................
    }

    public function update(Request $request)
    {
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'filiere'=> ['required', 'numeric'],
         ]);
         $id = request('id');
         $nom=request('nom');
         $filiere=request('filiere');
         Niveau::where('id', $id)->update([
           'nomniveau' => $nom,
           'idfil'=>$filiere
        ]);
        return redirect('/niveaux');
        //...............................
    }
    public function delete(Request $request)
    {
        $id = request('id');
        Niveau::destroy($id);
        return redirect('/niveaux');
    }}