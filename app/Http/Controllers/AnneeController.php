<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Annee;


class AnneeController extends Controller
{
    public function index()
    {
        $annees= Annee::all();
        return view('vue\annee')->with('annees',$annees);
    }
    
   
    public function findone(Request $request)
    {
        $annees= Annee::all();
        $id=request('id');
        $annee = $annees->find($id);
        return view('form\annee')->with('annee',$annee);
       
    }

    public function add(Request $request)
    {
       
        $request->validate([
            'annee' => ['required']
        ]);
        
        $anne=request('annee');
        Annee::create([
            'annee' => $anne
         ]);
        
         return redirect('/annees');
        }

    public function update(Request $request)
    {
        $request->validate([
            'annee' => ['required']        ]);


         $id=request('id');
         $anne=request('annee');
         Annee::where('id', $id)->update([
           'annee' => $anne
        ]);
        return redirect('/annees');
    
    }
    public function delete(Request $request)
    {
        $id=request('id');
        Annee::destroy($id);
        return redirect('/annees');
    }
}
