<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Etudiant;
use App\Models\Professeur;
use App\Models\Annee;
use App\Models\Formation;
use App\Models\Filiere;
use App\Models\Element;
use App\Models\Module;
use App\Models\Periode;
use App\Models\Seance;


class SearchController extends Controller 
{
    public function search(Request $request){
    if($request->ajax()){

       
        $etudiant=Etudiant::where('nom','like','%'.$request->search.'%')
        ->orwhere('prenom','like','%'.$request->search.'%')
        ->orwhere('CIN','like','%'.$request->search.'%')->get();
        $professeur=Professeur::where('nom','like','%'.$request->search.'%')
        ->orwhere('prenom','like','%'.$request->search.'%')
        ->orwhere('CIN','like','%'.$request->search.'%')->get();
        $annee=Annee::where('annee','like','%'.$request->search.'%')->get();
        $formation=Formation::where('nomfor','like','%'.$request->search.'%')->get();
        $filiere=Filiere::where('nomfil','like','%'.$request->search.'%')->get();
        $module=Module::where('nommodel','like','%'.$request->search.'%')->get();
        $element=Element::where('nomelement','like','%'.$request->search.'%')->get();
        $seance=Seance::where('nomsea','like','%'.$request->search.'%')->get();

      $output ='
            <table class="table">'
            ;
         if(isset($etudiant)||isset($professeur)||isset($professeur)||isset($annee)||isset($formation)||isset($filiere)||isset($module)||isset($element)||isset($seance))  { 
    if(count($etudiant)>0){
                foreach($etudiant as $row){
                    $output .='
                    <tr>
                    <th scope="row">Etudiant</th>
                    <td>'.$row->nom.' '.$row->prenom.'</td>
                    <td><div class="table-actions">
                    <a href="etudiant/'.$row->id. '". 
                        ><i class="fa-solid fa-plus"></i></a>
                 </div></td>
                    </tr>
                    ';
                }

    }
    if(count($professeur)>0){
        foreach($professeur as $row){
            $output .='
            <tr>
            <th scope="row">Professeur</th>
            <td>'.$row->nom.' '.$row->prenom.'</td>
            <td><div class="table-actions">
            <a href="professeur/'.$row->id. '". 
                ><i class="fa-solid fa-plus"></i></a>
         </div></td>
            </tr>
            ';
        }
    }if(count($annee)>0){
        foreach($annee as $row){
            $output .='
            <tr>
            <th scope="row">Annee</th>
            <td>'.$row->annee.'</td>
            <td><div class="table-actions">
            <a href="annee/'.$row->id. '". 
                ><i class="fa-solid fa-plus"></i></a>
         </div></td>
            </tr>
            ';
        }
    }if(count($formation)>0){
        foreach($formation as $row){
            $output .='
            <tr>
            <th scope="row">Formation</th>
            <td>'.$row->nomfor.'</td>
            <td><div class="table-actions">
            <a href="formation/'.$row->id. '". 
                ><i class="fa-solid fa-plus"></i></a>
         </div></td>
            </tr>
            ';
        }
    }if(count($filiere)>0){
        foreach($filiere as $row){
            $output .='
            <tr>
            <th scope="row">Filiere</th>
            <td>'.$row->nomfil.'</td>
            <td><div class="table-actions">
            <a href="filiere/'.$row->id. '". 
                ><i class="fa-solid fa-plus"></i></a>
         </div></td>
            </tr>
            ';
        }
    }if(count($module)>0){
        foreach($module as $row){
            $output .='
            <tr>
            <th scope="row">Module</th>
            <td>'.$row->nommodel.'</td>
            <td><div class="table-actions">
            <a href="module/'.$row->id. '". 
                ><i class="fa-solid fa-plus"></i></a>
         </div></td>
            </tr>
            ';
        }
    }if(count($element)>0){
        foreach($element as $row){
            $output .='
            <tr>
            <th scope="row">Element</th>
            <td>'.$row->nomelement.'</td>
            <td><div class="table-actions">
            <a href="element/'.$row->id. '". 
                ><i class="fa-solid fa-plus"></i></a>
         </div></td>
            </tr>
            ';
        }
    }if(count($seance)>0){
        foreach($seance as $row){
            $output .='
            <tr>
            <th scope="row">Seance</th>
            <td>'.$row->nomsea.'</td>
            <td><div class="table-actions">
            <a href="seance/'.$row->id. '". 
                ><i class="fa-solid fa-plus"></i></a>
         </div></td>
            </tr>
            ';
        }

    }}else{

        $output .='No results';

    }
 $output .= '
             </tbody>
            </table>';
    return $output;

    }




  }

}

