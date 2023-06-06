@extends('index')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title"> 
                        <h4>Editer</h4>   
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Filiere
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<div class="card-box pb-10">
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif
    <form  method="POST" action="/filiere/{{$filiere->id}}">
        @csrf
  <div class="modal-body">
    
    <div class="form-group">
        <label>Filiere<span style="color: red">*</span></label>
        <input
            type="text"
            class="form-control"
            placeholder="Filiere"
            name="nom"
            
            value={{$filiere->nomfil}}
        />
    </div>
    <div class="form-group">
        <label>Formation<span style="color: red">*</span></label>
        <select
        class=" form-control"
            
             name="formation"
        > @foreach ($annees as $annee)
            <optgroup label={{$annee->annee}} >
            @foreach ($formations as $formation)
             @if ($formation->ida==$annee->id)
              @if ($formation->id==$filiere->idfor)
              <option selected value={{$formation->id}}>{{$formation->nomfor}}</option>
              @else
                  <option value={{$formation->id}}>{{$formation->nomfor}}</option>
              @endif
                 
             @endif
                @endforeach
            </optgroup>
            @endforeach
        </select>
    </div>
  
   
           
             </div> 
              </div>
              <div class="modal-footer">
            
            
       
            <button type="submit" class="btn btn-warning">
                Mise a jour
            </button>
            <button  class="btn btn-danger">
                <a href="d/{{$filiere->id}}" >
                    Supprimer
               </a>
            </button>
       
              </div>
            </form>
               </div>
      
    </div>


@endsection