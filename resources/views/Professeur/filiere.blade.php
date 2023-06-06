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
                                Etudiants
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<div class="card-box pb-10">
   <script>
    let periodes  = {!! json_encode($filieres) !!};
            console.log(periodes);
            let niveaux  = {!! json_encode($niveaux) !!};
            console.log(niveaux);
            let elements  = {!! json_encode($elements) !!};
            console.log(elements);
   </script>
<table id="pxtable"  class="data-table table nowrap">
      <thead>
          <tr>
              <th>Filiere</th>
              <th>Niveau</th>
              <th>Element</th>
              <th class="datatable-nosort">Plus</th>
          </tr>
      </thead>
      <tbody>
          

          @foreach ($elements as $element)
          @if ($professeur->id==$element->idp)
          <tr>
             @php
             $module = $modules->find($element->idm);
             $semestre = $semestres->find($module->ids) ;  
              $niveau = $niveaux->find($semestre->idn)  ;
              $filiere = $filieres->find($niveau->idfil) ; 
            @endphp
              <td>{{$filiere->nomfil}}</td>
              <td>{{$niveau->nomniveau}}</td>
              <td>{{$element->nomelement}}</td>
              <td>
                  <div class="table-actions">
                     
                      <a href="mesetudiants/{{$niveau->id}}"data-color="#265ed7"
                          ><i class="fa-solid fa-plus"></i></a>
                  </div>
              </td>
          </tr>
          @endif
          @endforeach
      </tbody>
  </table>
</div>
   
@endsection