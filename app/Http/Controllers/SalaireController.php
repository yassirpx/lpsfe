<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professeur;
use App\Models\Seance;
use App\Models\Periode;
use App\Models\Element;
use Dompdf\Dompdf;
use PDF;
use TCPDF;



class SalaireController extends Controller{
public function enattend()
{
    $professeurs= Professeur::all();
    $seances= Seance::all();
    $Elements= Element::all();
    $periodes= Periode::all();
    return view('vue\enattend')->with('elements',$Elements)->with('professeurs',$professeurs)->with('seances',$seances)->with('periodes',$periodes);
}
public function eteverse()
{
    $professeurs= Professeur::all();
    $seances= Seance::all();
    $periodes= Periode::all();
    $Elements= Element::all();
    return view('vue\eteverse')->with('elements',$Elements)->with('professeurs',$professeurs)->with('seances',$seances)->with('periodes',$periodes);
}




public function facture(Request $request)
{
    $id = request('id');
    $professeurs= Professeur::all();
    $professeur = $professeurs->find($id);
    $seances= Seance::all();
    $periodes= Periode::all();
    $Elements= Element::all();
    return view('facture')->with('elements',$Elements)->with('professeur',$professeur)->with('seances',$seances)->with('periodes',$periodes)->with('ok',"ok");
}

public function recu(Request $request)
{
    $id = request('id');
    $professeurs= Professeur::all();
    $professeur = $professeurs->find($id);
    $seances= Seance::all();
    $periodes= Periode::all();
    $Elements= Element::all();
    return view('facture')->with('elements',$Elements)->with('professeur',$professeur)->with('seances',$seances)->with('periodes',$periodes);
}


public function Imprimer(Request $request)
{     
    
    $id = request('id');
    $professeurs= Professeur::all();
    $professeur = $professeurs->find($id);
    $seances= Seance::all();
    $periodes= Periode::all();
    $Elements= Element::all();
    $data=[
        'elements'=>$Elements,
        'professeur'=>$professeur,
        'seances'=>$seances,
        'periodes'=>$periodes,
    ];

        
   $pdf= new Dompdf();
   $pdf->loadHtml(view('pdf')->with('elements',$Elements)->with('professeur',$professeur)->with('seances',$seances)->with('periodes',$periodes));
   $pdf->setPaper('A4', 'landscape');
   $pdf->render();
   $pdf->stream($id.'.pdf',['Attachmant'=>false]);

}


public function verse(Request $request)
{
    $id=request('id');
    $professeurs= Professeur::all();
    $professeur = $professeurs->find($id);
    $type='eteverse';
    Professeur::where('id', $id)->update([
    'type'=> $type ,
    ]);
    $seances= Seance::all();
    $periodes= Periode::all();
    $Elements= Element::all();
    return view('vue\eteverse')->with('elements',$Elements)->with('professeurs',$professeurs)->with('seances',$seances)->with('periodes',$periodes);

}



}

?>