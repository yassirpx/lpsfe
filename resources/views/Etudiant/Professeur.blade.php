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
                                Professeur
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<div class="card-box pb-10">
        
   <table id="pxtable"  class="data-table table nowrap">
 <thead>
    <tr>
        <th class="table-plus">Nom Complet</th>
        <th>Element</th>
    </tr>
</thead>
<tbody>
    @foreach ($semestres as $semestre)
    @foreach ($modules as $module)
    @foreach ($elements as $element)
     @if ( $niveau->id==$semestre->idn && $semestre->id==$module->ids && $semestre->id==$element->idm)
     @php
          $professeur = $professeurs->find($element->idp);
     @endphp
    <tr>
        <td class="table-plus">
            <div class="name-avatar d-flex align-items-center">
                <div class="avatar mr-2 flex-shrink-0">
                    <img
                        src={{asset("img/".$professeur->photo)}}
                        class="border-radius-100 shadow"
                        width="40"
                        height="40"
                        alt=""
                    />
                </div>
                <div class="txt">
                    <div class="weight-600">{{$professeur->nom . ' ' .$professeur->prenom }}</div>
                </div>
            </div>
        </td>
        <td>
            {{$element->nomelement}}</td>
        
    </tr>
       @endif
    @endforeach
    @endforeach
    @endforeach
</tbody>
</table>
</div>
</div>
@endsection