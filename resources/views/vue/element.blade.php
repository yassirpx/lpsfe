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
                                Element
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
    style="width: 30px"
    
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
            <form  method="POST" action="/element">
                    @csrf
              <div class="modal-body">
                
                <div class="form-group">
                    <label class="col-sm-12 col-md-2 col-form-label">Element<span style="color: red">*</span>:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Element"
                        name="nom"
                        required
                    />
                </div>
                <div class="form-group">
                    <label>Module<span style="color: red">*</span></label>
                    <select
                       class=" form-control"
                        required
                         name="semestre"
                    > @foreach ($filieres as $filiere)
                        <optgroup label={{$filiere->nomfil}} >
                        @foreach ($niveaux as $niveau)
                        @foreach ($semestres as $semestre)
                        @foreach ($modules as $module)
                         @if ($niveau->idfil==$filiere->id && $niveau->id==$semestre->idn && $semestre->id==$module->ids   )
                         <option value={{$module->id}}>{{$module->nommodel}}</option>
                         @endif
                            @endforeach
                            @endforeach
                            @endforeach
                        </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-sm-12 col-md-2 col-form-label">Professeur<span style="color: red">*</span>:</label>
                        <select
                        class=" form-control"
                        required
                         name="prof"
                    >
                            @foreach ($professeurs as $professeur)
                            <option value={{$professeur->id}}>{{$professeur->nom." ".$professeur->prenom}}</option>
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
                <th>Element</th>
                <th>Module</th>
                <th>Professeur</th>
                <th class="datatable-nosort">Plus</th>
            </tr>
        </thead>
        <tbody>
       
            @foreach ($elements as $element)
            <tr>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="txt">
                            <div class="weight-600">{{$element->id}}</div>
                        </div>
                    </div>
                </td>
                <td>{{$element->nomelement}}</td>
                @php
                   $module = $modules->find($element->idm);
                   $professeur = $professeurs->find($element->idp);
                @endphp
                <td>
                    {{$module->nommodel}}</td>
                <td>
                    {{$professeur->nom ." " .$professeur->prenom}}</td>
                <td>
                    <div class="table-actions">
                        <a href="element/{{$element->id}}" data-color="#265ed7"
                            ><i class="fa-solid fa-pencil"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection