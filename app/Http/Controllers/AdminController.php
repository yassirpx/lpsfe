<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function add(Request $request)
    {
       
        $request->validate( [
            'nom' => ['required', 'string', 'max:255'],
            'pnom'=> ['required', 'string', 'max:255'],
            'CIN'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'max:255'],
            'password'=> ['required', 'string', 'max:255'],
          
         ]);
             
        
            $nom=request('nom');
            $pnom=request('pnom');
            $CIN=request('CIN');
            $email=request('email');
            $password=request('password');
          

                //hashing 
          $password2= Hash::make( $password);
          //....

          Admin::create(
           [ 
        'nom' => $nom ,
        'prenom'=>$pnom ,
        'CIN'=>  $CIN,
        'email'=> $email ,
        'password'=> $password2 ,
     ]);

      return redirect('/test');
        // ...................
    }
}
