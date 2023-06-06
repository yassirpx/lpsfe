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
                                Semestre
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
    <form  method="POST" action="/semestre/{{$semestre->id}}">
        @csrf
  <div class="modal-body">
    
    <div class="form-group">
        <label>Semestre<span style="color: red">*</span></label>
        <input
            type="text"
            class="form-control"
            placeholder="Semestre"
            name="nom"
            
            value={{$semestre->nomsem}}
        />
    </div>
    <div class="form-group">
        <label>Niveau<span style="color: red">*</span></label>
        <select
            class=" form-control"
            
             name="niveau"
        > @foreach ($filieres as $filiere)
            <optgroup label={{$filiere->nomfil}} >
            @foreach ($niveaux as $niveau)
             @if ($niveau->idfil==$filiere->id)
             @if ($niveau->id==$semestre->idn )
             <option selected value={{$niveau->id}}>{{$niveau->nomniveau}}</option>
             @else
             <option value={{$niveau->id}}>{{$niveau->nomniveau}}</option> 
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
                <a href="d/{{$semestre->id}}" >
                    Supprimer
               </a>
            </button>
       
              </div>
            </form>
               </div>
      
    </div>


@endsection