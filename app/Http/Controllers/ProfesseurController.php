<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Element;
use App\Models\Module;
use App\Models\Professeur;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Semestre;
use App\Models\Etudiant;

use Illuminate\Support\Facades\Hash;


class ProfesseurController extends Controller
{
    public function index()
    {
        $professeurs= Professeur::all();
        return view('vue\Professeur')->with('professeurs',$professeurs);
    }
   
   
    public function findone(Request $request)
    {
        $id = request('id');
        $professeurs= Professeur::all();
        $professeur = $professeurs->find($id);
        return view('form\Professeur')->with('professeur',$professeur);
       
    }

    public function add(Request $request)
    {
       
        $error= $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'pnom'=> ['required', 'string', 'max:255'],
            'CIN'=> ['required', 'string', 'max:255'],
            'telephone'=> ['required', 'string', 'max:255'],
            'adress'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'max:255'],
            'password'=> ['required', 'string', 'max:255'],
            'type'=> ['required', 'string', 'max:255'],
         ]);
             
        
            $nom=request('nom');
            $pnom=request('pnom');
            $CIN=request('CIN');
            $telephone=request('telephone');
            $adress=request('adress');
            $email=request('email');
            $password=request('password');
            $type=request('type');
            $prix_H=request('prix_H');
            if(empty($prix_H)){
                $prix_H=0; 
             }

                //hashing 
          $password2= Hash::make( $password);
          //....

        Professeur::create(
           [ 
        'nom' => $nom ,
        'prenom'=>$pnom ,
        'CIN'=>  $CIN,
        'telephone'=>$telephone ,
        'adress'=> $adress ,
        'email'=> $email ,
        'password'=> $password2 ,
        'type'=> $type ,
        'prix_par_H'=> $prix_H, ]);

      return redirect('/professeurs');
        // ...................
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
            'type'=> ['required', 'string', 'max:255'],
         ]);

         $id = request('id');
         $nom=request('nom');
         $pnom=request('pnom');
         $CIN=request('CIN');
         $telephone=request('telephone');
         $adress=request('adress');
         $email=request('email');
         $type=request('type');
         $prix_H=request('prix_H');
         if(empty($prix_H)){
            $prix_H=0; 
         }

         Professeur::where('id', $id)->update([
        'nom' => $nom ,
        'prenom'=>$pnom ,
        'CIN'=>  $CIN,
        'telephone'=>$telephone ,
        'adress'=> $adress ,
        'email'=> $email ,
        'type'=> $type ,
        'prix_par_H'=> $prix_H,
        ]);
        return redirect('/professeurs')->withErrors($error);
    }
    
    public function delete(Request $request)
    {
        $id = request('id');
        Professeur::destroy($id);
    }

    public function etudiants(Request $request)
    {    
        
        
        $id = $request->session()->get('id');
        $professeurs= Professeur::all();
        $professeur = $professeurs->find($id);
        $Elements= Element::all();
        $semestres= Semestre::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        $modules= Module::all();
       
        return view('Professeur\filiere')->with('professeur',$professeur)->with('elements',$Elements)->with('filieres',$filieres)->with('niveaux',$niveaux)->with('modules',$modules)->with('semestres',$semestres);

        
    }
     
    public function etudiant(Request $request)
    {    
        
        $id = request('id');
        $niveaux= Niveau::all();
        $niveau = $niveaux->find($id);
        $etudiants= Etudiant::all();
       
       
        return view('Professeur\etudiant')->with('etudiants',$etudiants)->with('niveau',$niveau);

        
    }




}
