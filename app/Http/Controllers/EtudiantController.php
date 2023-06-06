<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Etudiant;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Element;
use App\Models\Module;
use App\Models\Professeur;

use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants= Etudiant::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('vue\Etudiant')->with('etudiants',$etudiants)->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
    public function form()
    {
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('form\Etudiant')->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
   
    public function findone(Request $request)
    {
        $id=request('id');
        $etudiants= Etudiant::all();
        $etudiant = $etudiants->find($id);
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('form\Etudiant')->with('etudiant',$etudiant)->with('niveaux',$niveaux)->with('filieres',$filieres);
       
    }

    public function add(Request $request)
    {
        $error=$request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'pnom'=> ['required', 'string', 'max:255'],
            'CIN'=> ['required', 'string', 'max:255'],
            'telephone'=> ['required', 'string', 'max:255'],
            'adress'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'max:255'],
            'password'=> ['required', 'string', 'max:255'],
            'CNE'=> ['required', 'string', 'max:255'],
            'niveau'=> ['required', 'numeric'],
         ]);
       
         $nom=request('nom');
         $pnom=request('pnom');
         $CIN=request('CIN');
         $telephone=request('telephone');
         $adress=request('adress');
         $email=request('email');
         $password=request('password');
         $CNE=request('CNE');
         $niveau=request('niveau');

             //hashing 
          $password2= Hash::make( $password);
             //....

        Etudiant::create(
           [ 'nom' => $nom ,
        'prenom'=>$pnom ,
        'CIN'=>  $CIN,
        'telephone'=>$telephone ,
        'adress'=> $adress ,
        'email'=> $email ,
        'password'=> $password2 ,
        'CNE'=> $CNE ,
        'idn'=> $niveau ]);
        return redirect('/etudiants')->withErrors($error);
        // .....................
    }

    public function update(Request $request)
    {
        $error= $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'pnom'=> ['required', 'string', 'max:255'],
            'CIN'=> ['required', 'string', 'max:255'],
            'telephone'=> ['required', 'string', 'max:255'],
            'adress'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'max:255'],
            'CNE'=> ['required', 'string', 'max:255'],
            'niveau'=> ['required', 'numeric'],
         ]);

      
        $id=request('id');
        $nom=request('nom');
        $pnom=request('pnom');
        $CIN=request('CIN');
        $telephone=request('telephone');
        $adress=request('adress');
        $email=request('email');
        $CNE=request('CNE');
        $niveau=request('niveau');

         Etudiant::where('id', $id)->update([
            'nom' => $nom ,
            'prenom'=>$pnom ,
            'CIN'=>  $CIN,
            'telephone'=>$telephone ,
            'adress'=> $adress ,
            'email'=> $email ,
            'CNE'=> $CNE ,
            'idn'=> $niveau ,
        ]);
    
        return redirect('/etudiants')->withErrors($error);
    }
    public function delete(Request $request)
    {
        $id=request('id');
        Etudiant::destroy($id);
    }

    public function etude(Request $request)
    {   

        $ide = $request->session()->get('id');
        $etudiants= Etudiant::all();
        $etudiant = $etudiants->find($ide);
        $id = $etudiant->id;
        $niveaux= Niveau::all();
        $niveau = $niveaux->find($id);
       
       
       
        return view('Etudiant\Etudiant')->with('etudiants',$etudiants)->with('niveau',$niveau);
    }
    public function prof(Request $request)
    {   

        $ide = $request->session()->get('id');
        $etudiants= Etudiant::all();
        $etudiant = $etudiants->find($ide);
        $id = $etudiant->idn;
        $niveaux= Niveau::all();
        $niveau = $niveaux->find($id);
        $Elements= Element::all();
        $semestres= Semestre::all();
        $modules= Module::all();
        $professeurs= Professeur::all();
        return view('Etudiant\Professeur')->with('niveau',$niveau)->with('elements',$Elements)->with('modules',$modules)->with('professeurs',$professeurs)->with('semestres',$semestres);
    }





}
