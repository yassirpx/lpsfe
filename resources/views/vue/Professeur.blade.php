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
    <a
    href="/professeur"
    class="btn-block" 
>

     <div class="h5 pd-20 mb-0">
           <h3>
            <i class="fa-regular fa-square-plus fa-lg"></i></i></h3></div>
                        </a>
        
                        <table id="pxtable"  class="data-table table nowrap">
 <thead>
    <tr>
        <th class="table-plus">Nom Complet</th>
        <th>CIN</th>
        <th>Telephone</th>
        <th class="table-plus">Address</th>
        <th>Genre</th>
        <th class="datatable-nosort">Plus</th>
    </tr>
</thead>
<tbody>
    @foreach ($professeurs as $professeur)
    <tr>
        <td class="table-plus">
            <div class="name-avatar d-flex align-items-center">
                <div class="avatar mr-2 flex-shrink-0">
                    <img
                        src={{asset('img/'.$professeur->photo)}}
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
        <td>{{$professeur->adress}}</td>
        <td>@if ($professeur->type=='permanent')
            <span
                class="badge badge-pill"
                data-bgcolor="#e7ebf5"
                data-color="#265ed7"
                >Permanent</span
            >
            
        @else
        @if ($professeur->type=='enattend')
            <span
                class="badge badge-pill"
                data-bgcolor="#e7ebf5"
                data-color="#F46F30"
                >Vacataire</span
            >
             @endif
        @endif
            
            
        </td>
        <td>
            <div class="table-actions">
                <a href="professeur/{{$professeur->id}}" data-color="#265ed7"
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