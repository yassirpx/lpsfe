<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seance;
use App\Models\Periode;
use App\Models\Semestre;
use App\Models\Element;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Professeur;

class SeanceController extends Controller
{
    public function index()
    {
        $seances= Seance::all();
        $periodes= Periode::all();
        $semestres= Semestre::all();
        $Elements= Element::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('vue/seance')->with('seances',$seances)->with('periodes',$periodes)->with('elements',$Elements)->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
    }
   
    public function findone(Request $request)
    {
        $seances= Seance::all();
        $id=request('id');
        $seance = $seances->find($id);
        $periodes= Periode::all();
        $semestres= Semestre::all();
        $Elements= Element::all();
        $niveaux= Niveau::all();
        $filieres= Filiere::all();
        return view('form/seance')->with('seance',$seance)->with('periodes',$periodes)->with('elements',$Elements)->with('semestres',$semestres)->with('niveaux',$niveaux)->with('filieres',$filieres);
   
       
    }
    public function calendrier(Request $request)
    {   
        $per = [];
        $sean = [];
       $stats='Admin';
        $id = request('id');
        $niveaux= Niveau::all();
        $niveau = $niveaux->find($id);
        $semestres= Semestre::all();
        $seances= Seance::all();
        $periodes= Periode::all();
          foreach ($semestres as $semestre){
            foreach ($periodes as $periode){
            if($niveau->id==$semestre->idn && $semestre->id==$periode->ids)
            {
                $per[]=$periode;
               foreach ($seances as $seance) {
                if(   $seance->idper==$periode->id ){
                    $sean[]=$seance;
                }
               }
            }
        }}
        return view('calendrier')->with('periodes',$per)->with('seances',$sean)->with('stats',$stats);
       
    }
    public function mescalendrier(Request $request)
    {   
        $per = [];
        $sean = [];

        $ide = $request->session()->get('id');
        $stats = $request->session()->get('stats');
        $etudiants= Etudiant::all();
        $etudiant = $etudiants->find($ide);
        $id = $etudiant->idn;
        $niveaux= Niveau::all();
        $niveau = $niveaux->find($id);
        $semestres= Semestre::all();
        $seances= Seance::all();
        $periodes= Periode::all();
          foreach ($semestres as $semestre){
            foreach ($periodes as $periode){
            if($niveau->id==$semestre->idn && $semestre->id==$periode->ids)
            {
                $per[]=$periode;
               foreach ($seances as $seance) {
                if(   $seance->idper==$periode->id ){
                    $sean[]=$seance;
                }
               }
            }
        }}
        return view('calendrier')->with('periodes',$per)->with('seances',$sean)->with('stats',$stats);
       
    }
    public function moncalendrier(Request $request)
    {   
        $per = [];
        $sean = [];

        $id = $request->session()->get('id');
        $stats = $request->session()->get('stats');
        $professeurs= Professeur::all();
        $professeur = $professeurs->find($id);
        $elements= Element::all();
        $periodes= Periode::all();
        $seances= Seance::all();
        foreach ($elements as $element){
            foreach ($periodes as $periode){
            if($element->idp==$professeur->id && $element->id==$periode->idele)
            {
                $per[]=$periode;
               foreach ($seances as $seance) {
                if(   $seance->idper==$periode->id ){
                    $sean[]=$seance;
                }
               }
            }}
        }
        return view('calendrier')->with('periodes',$per)->with('seances',$sean)->with('stats',$stats);
       
    }
    public function valide(Request $request)
    {
        $id=request('id');
        $seances= Seance::all();
        $seance = $seances->find($id);
        $nsean= $seance->nsean+1;
     Seance::where('id', $id)->update([
        'nsean'=>$nsean,
        
    ]);
    return redirect()->back();
    }
 

    public function add(Request $request)
    {
       
        $request->validate( [
            'debutsean' => ['required', 'string', 'max:255'],
            'finsean' => ['required', 'string', 'max:255'],
            'periode'=> ['required', 'numeric'],
            'day'=> ['required', 'numeric'],
            'nom' => ['required'],
         ]);
            $nom=request('nom');
            $day=request('day');
            $debutsean=request('debutsean');
            $finsean=request('finsean');
            $idper=request('periode');
            $nsean = 0;

        Seance::create([
         'nomsea'=>$nom,
         'daysean'=>$day,
         'nsean'=>$nsean,
        'debutsean' => $debutsean ,
        'finsean'=>$finsean ,
        'idper'=>  $idper]);
        return redirect('/seances');
        // ...............................
    }

    public function update(Request $request)
    {
        $request->validate( [
            'debutsean' => ['required', 'string', 'max:255'],
            'finsean' => ['required', 'string', 'max:255'],
            'periode'=> ['required', 'numeric'],
            'day'=> ['required', 'numeric'],
            'nom' => ['required'],
         ]);
            $nom=request('nom');
            $day=request('day');
            $debutsean=request('debutsean');
            $finsean=request('finsean');
            $idper=request('periode');

         Seance::where('id', $id)->update([
            'nomsea'=>$nom,
            'daysean'=>$day,
           'debutsean' => $debutsean ,
           'finsean'=>$finsean ,
           'idper'=>  $idper
        ]);
        return redirect('/seances');
    
    }
    public function delete(Request $request)
    {
        $id=request('id');
        Seance::destroy($id);
        return redirect('/seances');
    }
}
