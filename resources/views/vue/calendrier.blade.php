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
                                calendrier
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
              <th class="table-plus">ID</th>
              <th>Niveau</th>
              <th>Filiere</th>
              <th class="datatable-nosort">Plus</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($niveaux as $niveau)
          <tr>
              <td class="table-plus">
                  <div class="name-avatar d-flex align-items-center">
                      <div class="txt">
                          <div class="weight-600">{{$niveau->id}}</div>
                      </div>
                  </div>
              </td>
              <td>{{$niveau->nomniveau}}</td>
              <td>@php
                 $filiere = $filieres->find($niveau->idfil);
              @endphp
                  {{$filiere->nomfil}}</td>
              <td>
                  <div class="table-actions">
                     
                      <a href="calendrier/{{$niveau->id}}"data-color="#265ed7"
                          ><i class="fa-regular fa-calendar-plus"></i></a>
                  </div>
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
   
@endsection