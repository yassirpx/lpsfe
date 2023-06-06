<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Models\Etudiant;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;





class AuthentificationController extends Controller{
public function login(Request $request){


    $request->validate( [
        'email' => ['required', 'string', 'max:255'],
        'password' => ['required', 'string', 'max:255'],
     ]);
    $email = request('email');
    $password = request('password');

    $Professeur = Professeur::where('email', $email)->first();
    $Etudiant = Etudiant::where('email', $email)->first();
    $Admin = Admin::where('email', $email)->first();;
   
   
    if ($Professeur) {
        if ( Hash::check($password, $Professeur->password)) {
            $request->session()->put('id', $Professeur->id);
            $request->session()->put('stats',"Professeur");
            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['password' => 'Mot de passe incorrect']);
        }
    } elseif ($Etudiant) {
        if (Hash::check($password, $Etudiant->password)) {
            $request->session()->put('id', $Etudiant->id);
            $request->session()->put('stats',"Etudiant");
            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['password' => 'Mot de passe incorrect']);
        }
    } elseif ($Admin) {
        if (Hash::check($password, $Admin->password)) {
            $request->session()->put('id', 1);
            $request->session()->put('stats',"Admin");
            return redirect('/');
        }else{
            return redirect()->back()->withErrors(['password' => 'Mot de passe incorrect']);
        }

    } else {
        return redirect()->back()->withErrors(['email' => "Nom d'utilisateur incorrect"]);
    }  
}

public function logout(Request $request)
{
    $request->session()->flush();
    return redirect('/login');
}

public function profile(Request $request)
{

    $id = $request->session()->get('id');
    $stats = $request->session()->get('stats');
    if($stats =="Professeur" ){
    $professeurs= Professeur::all();
    $user = $professeurs->find($id);
    }elseif ($stats =="Etudiant") {
        $etudiants= Etudiant::all();
        $user = $etudiants->find($id);
    }elseif($stats =="Admin" ){
        $admin= Admin::all();
        $user = $admin->find($id);
        }
    return view('profile')->with('user',$user);
}



public function dashbord(Request $request){

    $id = $request->session()->get('id');
    $stats = $request->session()->get('stats');
    if($stats =="Professeur"){
    $professeurs= Professeur::all();
    $user = $professeurs->find($id);
    return view('dashbord')->with('user',$user);



    }elseif ($stats =="Etudiant") {
        $etudiants= Etudiant::all();
        $user = $etudiants->find($id);
        return view('dashbord')->with('user',$user);
    }elseif($stats =="Admin" ){
        $admin= Admin::all();
        $user = $admin->find($id);
        return view('dashbord')->with('user',$user);
        }

} 


public function edit(Request $request)
{

    $id = $request->session()->get('id');
    $stats = $request->session()->get('stats');
    if($stats =="Professeur" ){
        $error=$request->validate( [
            'photo'=> ['required', 'file'],
            'telephone'=> ['required', 'string', 'max:255'],
            'adress'=> ['required', 'string', 'max:255'],
            'gmail'=> ['required', 'string', 'max:255'],
            'datenaissance'=> ['required', 'max:255'],
            'genre'=> ['required', 'string', 'max:255'],
         ]);
         
         if ($request->hasFile('photo')) {
            $photo=request('photo');
            $file = $request->file('photo');
            $path = 'px'.$file->getClientOriginalName();
            $request->file('photo')->storeAs('img',$path,'public_px')
            ;}
      
         $telephone=request('telephone');
         $adress=request('adress');
         $genre=request('genre');
         $datenaissance=request('datenaissance');
         $gmail=request('gmail');
        

         Professeur::where('id', $id)->update([
            'photo'=>  $path,
        'gmail'=>$gmail ,
        'telephone'=>$telephone ,
        'adress'=> $adress ,
        'datenaissance'=>$datenaissance ,
        'genre'=>$genre , ])
        ;
   
    }elseif ($stats =="Etudiant") {
        $request->validate([
            'photo'=> ['required','file' ],
            'telephone'=> ['required', 'string', 'max:255'],
            'adress'=> ['required', 'string', 'max:255'],
            'datenaissance'=> ['required', 'string', 'max:255'],
            'genre'=> ['required', 'string', 'max:255'],
         ]);

     
         if ($request->hasFile('photo')) {
            $photo=request('photo');
            $file = $request->file('photo');
            $path = 'px'.$file->getClientOriginalName();
            $request->file('photo')->storeAs('img',$path,'public_px')
            ;}
         $telephone=request('telephone');
         $genre=request('genre');
         $datenaissance=request('datenaissance');
         $adress=request('adress');


         Etudiant::where('id', $id)->update([
            'photo'=>  $path,
            'telephone'=>$telephone ,
            'adress'=> $adress ,
            'datenaissance'=>$datenaissance ,
            'genre'=>$genre ,

        ]);
    }elseif($stats =="Admin" ){
        $request->validate( [
            'photo'=> ['required', 'file' ],  
         ]);

         if ($request->hasFile('photo')) {
            $photo=request('photo');
            $file = $request->file('photo');
            $path = 'px'.$file->getClientOriginalName();
            $request->file('photo')->storeAs('img',$path,'public_px')
            ;}
    
            Admin::where('id', $id)->update([
            'photo'=>  $path,
        ]);
    }
    return  redirect('/profile/'.$id);
}

}


?>