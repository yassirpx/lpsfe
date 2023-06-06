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
                                Niveau
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
    <form  method="POST" action="/niveau/{{$niveau->id}}">
        @csrf
  <div class="modal-body">
    
    <div class="form-group">
        <label class="col-sm-12 col-md-2 col-form-label">Niveau<span style="color: red">*</span>:</label>
        <input
            type="text"
            class="form-control"
            placeholder="Niveau"
            name="nom"
            
            value={{$niveau->nomniveau}}
        />
    </div>
    <div class="form-group">
        <label class="col-sm-12 col-md-2 col-form-label">filiere<span style="color: red">*</span>:</label>
        
            <select
            class=" form-control"
            
             name="filiere"
        >
                @foreach ($filieres as $filiere)
                @if ($filiere->id == $niveau->idfil)
                <option selected value={{$filiere->id}}>{{$filiere->nomfil}}</option>
                @else
                 <option value={{$filiere->id}}>{{$filiere->nomfil}}</option>   
                @endif
                
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
                <a href="d/{{$niveau->id}}" >
                    Supprimer
               </a>
            </button>
       
              </div>
            </form>
               </div>
      
    </div>


@endsection