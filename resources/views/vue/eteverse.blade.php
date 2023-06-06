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
                                Eté Versé
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
        <th>CIN</th>
        <th>Telephone</th>
        <th>nombre des seances</th>
        <th>prix total</th>
        <th class="datatable-nosort" >reçu</th>
        
    </tr>
</thead>
<tbody>
    @foreach ($professeurs as $professeur)
    @if ($professeur->type=='eteverse')
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
        <td>{{$professeur->CIN}}</td>
        <td>{{$professeur->telephone}}</td>
        <td>{{$professeur->prix_par_H."DH"}}</td>
        @php
        $ntsean=0;
    @endphp
        @foreach ($elements as $element)
        @foreach ($periodes as $periode)
         @foreach ($seances as $seance)
         @if ($professeur->id==$element->idp && $element->id==$periode->idele && $periode->id==$seance->idper )
                @php
                     
                    $ntsean=$ntsean+$seance->nsean
                @endphp 
           @endif
          @endforeach   
         @endforeach 
     @endforeach
     <td>  {{($ntsean*$professeur->prix_par_H)."DH" }}   </td>
     <td>
        <div class="table-actions">
            <a href="/recu/{{$professeur->id}}" data-color="#265ed7"
            ><i class="fa-solid fa-eye"></i></a>
           
        </div>
    </td>
    </tr
    >@endif
    @endforeach
     
</tbody>
</table>
</div>
</div>
@endsection