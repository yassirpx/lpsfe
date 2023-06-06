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
                                Module
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<div class="card-box pb-10">
    <a
    href="#"
    class="btn-block"
    data-toggle="modal"
    data-target="#bd-example-modal-lg"
    type="button"
    
>

     <div class="h5 pd-20 mb-0">
           <h3>
            <i class="fa-regular fa-square-plus fa-lg"></i></h3></div>
                        </a>
     <div
             class="modal fade bs-example-modal-lg"
            id="bd-example-modal-lg"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myLargeModalLabel"
            aria-hidden="true"
>
            <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">
                    FORM
                </h4>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true"
                >
                    ×
                </button>
            </div>
            <form  method="POST" action="/module">
                    @csrf
              <div class="modal-body">
                
                <div class="form-group">
                    <label>Module<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Module"
                        name="nom"
                        required
                    />
                </div>
                <div class="form-group">
                    <label>Semestre<span style="color: red">*</span></label>
                    <select
                       class=" form-control"
                        required
                         name="semestre"
                    > @foreach ($filieres as $filiere)
                        <optgroup label={{$filiere->nomfil}} >
                        @foreach ($niveaux as $niveau)
                        @foreach ($semestres as $semestre)
                         @if ($niveau->idfil==$filiere->id && $niveau->id==$semestre->idn  )
                             <option value={{$semestre->id}}>{{$semestre->nomsem}}</option>
                         @endif
                            @endforeach
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
              </div>
              <div class="modal-footer">
            
                <button type="submit" class="btn btn-primary">
                    AJOUTER
                </button>
              </div>
            </form>
               </div>
        </div>
 </div>
 <table id="pxtable"  class="data-table table nowrap">
        <thead>
            <tr>
                <th class="table-plus">ID</th>
                <th>Module</th>
                <th>Semestre</th>
                <th>Filiere</th>
                <th class="datatable-nosort">Plus</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
            <tr>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="txt">
                            <div class="weight-600">{{$module->id}}</div>
                        </div>
                    </div>
                </td>
                <td>{{$module->nommodel}}</td>
                @php
                    $semestre = $semestres->find($module->ids);
                   $niveau = $niveaux->find($semestre->idn);
                   $filiere = $filieres->find($niveau->idfil);

                @endphp
                <td>
                    {{$semestre->nomsem}}</td>
                <td>
                    {{$filiere->nomfil}}</td>
                <td>
                    <div class="table-actions">
                        <a href="/module/{{$module->id}}" data-color="#265ed7"
                            ><i class="fa-solid fa-pencil"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection