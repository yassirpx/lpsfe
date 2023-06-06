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
                               Periode
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
    <form  method="POST" action="/periode/{{$periode->id}}">
        @csrf
  <div class="modal-body">
    <div class="form-group">
        <label >Date debut<span style="color: red">*</span>:</label>
        <input
            type="date"
            class="form-control form-control-lg"
            name="debutperi"
            
            value="{{$periode->debutperi}}"
        />
    </div>
    <div class="form-group">
        <label >Date fin<span style="color: red">*</span>:</label>
        <input
            type="date"
            class="form-control form-control-lg"
            name="finperi"
            
            value="{{$periode->finperi}}"
        />
    </div>
    <div class="form-group">
        <label >Element<span style="color: red">*</span>:</label>
        
            <select
            class=" form-control"
            
             name="element"
        >
                @foreach ($elements as $element)
                @if ($periode->idele==$element->id)
                <option selected value={{$element->id}}>{{$element->nomelement}}</option> 
                @else
                 <option value={{$element->id}}>{{$element->nomelement}}</option>   
                @endif
                
                @endforeach
                
            </select>
    
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
             @if ($niveau->idfil==$filiere->id && $niveau->id==$semestre->idn  )
             @if ($periode->ids ==$semestre->id )
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
    <button class="btn btn-danger">
        <a href="d/{{$periode->id}}" >
             Supprimer
        </a>
       
    </button>
  </div>
</form>
   </div>
</div>


@endsection