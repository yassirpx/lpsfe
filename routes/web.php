<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnneeController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\SalaireController;
use App\Http\Controllers\AuthentificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SearchController;

use Illuminate\Http\Request;


// Routing pages

Route::get('/',function(Request $request){
    return view('index');
} )->middleware('conix');

Route::get('/403',function(){
    return view('403');
} )->middleware('conix');

Route::get('/',function(){
    return view('search');
} );

Route::post('/admin',[AdminController::class,'add'] );


// .....................................

//Etudiant
Route::get('/etudiant',[EtudiantController::class,'form'] )->middleware('admin');
Route::get('/etudiants',[EtudiantController::class,'index'] )->middleware('admin');
Route::post('/etudiant',[EtudiantController::class,'add'] )->middleware('admin');
Route::get('/etudiant/{id}',[EtudiantController::class,'findone'] )->middleware('admin');
Route::post('etudiant/{id}',[EtudiantController::class,'update'] )->middleware('admin');
Route::get('etudiant/d/{id}',[EtudiantController::class,'delete'] )->middleware('admin');
// ..................................
Route::get('/mescollegues',[EtudiantController::class,'etude'] )->middleware('etudiant');
Route::get('/mesprofesseur',[EtudiantController::class,'prof'] )->middleware('etudiant');
// ..........

//Professeur

Route::get('/professeur',function(){ return view('form\Professeur');} )->middleware('admin');
Route::get('/professeurs',[ProfesseurController::class,'index'] )->middleware('admin');
Route::post('/professeur',[ProfesseurController::class,'add'] )->middleware('admin');
Route::get('/professeur/{id}',[ProfesseurController::class,'findone'] )->middleware('admin');
Route::post('professeur/{id}',[ProfesseurController::class,'update'] )->middleware('admin');
Route::get('professeur/d/{id}',[ProfesseurController::class,'delete'] )->middleware('admin');
// .......................
Route::get('/mesetudiants',[ProfesseurController::class,'etudiants'] )->middleware('professeur');
Route::get('/mesetudiants/{id}',[ProfesseurController::class,'etudiant'] )->middleware('professeur');

// ..........

//Annee

Route::get('/annees',[AnneeController::class,'index'] )->middleware('admin');
Route::post('/annee',[AnneeController::class,'add'] )->middleware('admin');
Route::get('/annee/{id}',[AnneeController::class,'findone'] )->middleware('admin');
Route::post('annee/{id}',[AnneeController::class,'update'] )->middleware('admin');
Route::get('annee/d/{id}',[AnneeController::class,'delete'] )->middleware('admin');

// ..........

//Element

Route::get('/elements',[ElementController::class,'index'] )->middleware('admin');
Route::post('/element',[ElementController::class,'add'] )->middleware('admin');
Route::get('/element/{id}',[ElementController::class,'findone'] )->middleware('admin');
Route::post('element/{id}',[ElementController::class,'update'] )->middleware('admin');
Route::get('element/d/{id}',[ElementController::class,'delete'] )->middleware('admin');

// ..........

//Filiere

Route::get('/filieres',[FiliereController::class,'index'] )->middleware('admin');
Route::post('/filiere',[FiliereController::class,'add'] )->middleware('admin');
Route::get('/filiere/{id}',[FiliereController::class,'findone'] )->middleware('admin');
Route::post('filiere/{id}',[FiliereController::class,'update'] )->middleware('admin');
Route::get('filiere/d/{id}',[FiliereController::class,'delete'] )->middleware('admin');

// ..........

//Formation
Route::get('/formations',[FormationController::class,'index'] )->middleware('admin');
Route::post('/formation',[FormationController::class,'add'] )->middleware('admin');
Route::get('/formation/{id}',[FormationController::class,'findone'] )->middleware('admin');
Route::post('formation/{id}',[FormationController::class,'update'] )->middleware('admin');
Route::get('formation/d/{id}',[FormationController::class,'delete'] )->middleware('admin');

// ..........

//Module

Route::get('/modules',[ModuleController::class,'index'] )->middleware('admin');
Route::post('/module',[ModuleController::class,'add'] )->middleware('admin');
Route::get('/module/{id}',[ModuleController::class,'findone'] )->middleware('admin');
Route::post('module/{id}',[ModuleController::class,'update'] )->middleware('admin');
Route::get('module/d/{id}',[ModuleController::class,'delete'] )->middleware('admin');

// ..........

//Niveau

Route::get('/niveaux',[NiveauController::class,'index'] )->middleware('admin');
Route::get('/calendrier',[NiveauController::class,'calendrier'])->middleware('admin');
Route::post('/niveau',[NiveauController::class,'add'] )->middleware('admin');
Route::get('/niveau/{id}',[NiveauController::class,'findone'] )->middleware('admin');
Route::post('niveau/{id}',[NiveauController::class,'update'] )->middleware('admin');
Route::get('niveau/d/{id}',[NiveauController::class,'delete'] )->middleware('admin');

// ..........

//Semestre

Route::get('/semestres',[SemestreController::class,'index'] )->middleware('admin');
Route::post('/semestre',[SemestreController::class,'add'] )->middleware('admin');
Route::get('/semestre/{id}',[SemestreController::class,'findone'] )->middleware('admin');
Route::post('semestre/{id}',[SemestreController::class,'update'] )->middleware('admin');
Route::get('semestre/d/{id}',[SemestreController::class,'delete'] )->middleware('admin');

// ..........

//Periode

Route::get('/periodes',[PeriodeController::class,'index'] )->middleware('admin');
Route::post('/periode',[PeriodeController::class,'add'] )->middleware('admin');
Route::get('/periode/{id}',[PeriodeController::class,'findone'] )->middleware('admin');
Route::post('periode/{id}',[PeriodeController::class,'update'] )->middleware('admin');
Route::get('periode/d/{id}',[PeriodeController::class,'delete'] )->middleware('admin');

// ..........

//seance

Route::get('/seances',[SeanceController::class,'index'] )->middleware('admin');
Route::post('/seance',[SeanceController::class,'add'] )->middleware('admin');
Route::get('/seance/{id}',[SeanceController::class,'findone'] )->middleware('admin');
Route::post('seance/{id}',[SeanceController::class,'update'] )->middleware('admin');
Route::get('seance/d/{id}',[SeanceController::class,'delete'] )->middleware('admin');
Route::get('/calendrier/{id}',[SeanceController::class,'calendrier'] )->middleware('admin');
// ............................................
Route::get('/moncalendrier',[SeanceController::class,'moncalendrier'] )->middleware('professeur');
Route::get('/valide/{id}',[SeanceController::class,'valide'] )->middleware('professeur');
// .................................................................
Route::get('/mescalendrier',[SeanceController::class,'mescalendrier'] )->middleware('etudiant');
// ..........

//Salaire
Route::get('/enattend',[SalaireController::class,'enattend'] )->middleware('admin');
Route::get('/eteverse',[SalaireController::class,'eteverse'] )->middleware('admin');
Route::get('/facture/{id}',[SalaireController::class,'facture'] )->middleware('admin');
Route::get('/recu/{id}',[SalaireController::class,'recu'] )->middleware('admin');
Route::get('/pdf/{id}',[SalaireController::class,'Imprimer'] )->middleware('admin');
Route::get('/verse/{id}',[SalaireController::class,'verse'] )->middleware('admin');

//..........................


// Authentification
Route::get('/login',function(){return view('login');} );
Route::post('/login',[AuthentificationController::class,'login'] );
Route::get('/logout',[AuthentificationController::class,'logout'] )->middleware('conix');
Route::get('/profile/{id}',[AuthentificationController::class,'profile'] )->middleware('conix');
Route::post('/profile/{id}',[AuthentificationController::class,'edit'] )->middleware('conix');
Route::get('/',[AuthentificationController::class,'dashbord'])->middleware('conix');
// ...............................

// ................................
Route::get("search",[SearchController::class,'search'])->middleware('admin');