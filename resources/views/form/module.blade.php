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
                                Module
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
    <form  method="POST" action="/module/{{$module->id}}">
        @csrf
  <div class="modal-body">
    
    <div class="form-group">
        <label>Module<span style="color: red">*</span></label>
        <input
            type="text"
            class="form-control"
            placeholder="Module"
            name="nom"
            
            value={{$module->nommodel}}
        />
    </div>
    <div class="form-group">
        <label>Semestre<span style="color: red">*</span></label>
        <select
           class=" form-control"
            
             name="semestre"
        > @foreach ($filieres as $filiere)
            <optgroup label={{$filiere->nomfil}} >
            @foreach ($niveaux as $niveau)
            @foreach ($semestres as $semestre)
             @if ($niveau->idfil==$filiere->id && $niveau->id==$semestre->idn )
             @if ($module->ids==$semestre->id)
             <option selected value={{$semestre->id}}>{{$semestre->nomsem}}</option>  
             @else
                 <option value={{$semestre->id}}>{{$semestre->nomsem}}</option>
             @endif
                 
             @endif
                @endforeach
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
                <a href="d/{{$module->id}}" >
                    Supprimer
               </a>
            </button>
       
              </div>
            </form>
               </div>
      
    </div>


@endsection