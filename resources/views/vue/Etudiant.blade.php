@extends('index')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Vue</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Etudiant
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<div class="card-box pb-10">
    <a
    href="/etudiant"
    class="btn-block" 
>

     <div class="h5 pd-20 mb-0">
           <h3>
            <i class="fa-regular fa-square-plus fa-lg"></i></h3></div>
                        </a>
        
                        <table id="pxtable"  class="data-table table nowrap">
 <thead>
    <tr>
        <th class="table-plus">Nom Complet</th>
        <th>CIN</th>
        <th>CNE</th>
        <th>Filiere</th>
        <th>Niveau</th>
        <th class="datatable-nosort">Plus</th>
    </tr>
</thead>
<tbody>
    @foreach ($etudiants as $etudiant)
    <tr>
        <td class="table-plus">
            <div class="name-avatar d-flex align-items-center">
                <div class="avatar mr-2 flex-shrink-0">
                    <img
                        src={{asset('img/'.$etudiant->photo)}}
                        class="border-radius-100 shadow"
                        width="40"
                        height="40"
                        alt=""
                    />
                </div>
                <div class="txt">
                    <div class="weight-600">{{$etudiant->nom . ' ' .$etudiant->prenom }}</div>
                </div>
            </div>
        </td>
        <td>{{$etudiant->CIN}}</td>
        <td>{{$etudiant->CNE}}</td>
        @php   
       $niveau = $niveaux->find($etudiant->idn);
       $filiere = $filieres->find($niveau->idfil);
    @endphp
    <td>
        {{$filiere->nomfil}}</td>
        <td>
            {{$niveau->nomniveau}}</td>
        <td>
            <div class="table-actions">
                <a href="etudiant/{{$etudiant->id}}" data-color="#265ed7"
                    ><i class="fa-solid fa-pencil"></i></a>
            </div>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
@endsection