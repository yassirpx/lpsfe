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
                                Seance
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
    <form  method="POST" action="/seance/{{$seance->id}}">
        @csrf
  <div class="modal-body">
    <div class="form-group">
        <label >Seance<span style="color: red">*</span>:</label>
        
            <select
            class=" form-control"
            
             name="nom"
        >
             <option selected value="{{$seance->nomsea}}">{{$seance->nomsea}}  </option>
                @foreach ($elements as $element)
                <optgroup label={{$element->nomelement}} >
                <option value='{{$element->nomelement.'Cour'}}'>Cour</option>
                <option value="{{$element->nomelement.'TP'}}">Travaux Pratique</option>
            </optgroup>
                @endforeach
                
            </select>
            <div class="form-group">
                <label >Jour<span style="color: red">*</span>:</label>
                
                    <select
                    class=" form-control"
                    
                     name="day"
                >       @switch($seance->daysean)
                    @case(1)
                    <option selected value=1>Lundi</option>
                    <option value=2>Mardi</option>
                    <option value=3>Mercredi</option>
                    <option value=4>Jeudi</option>
                    <option value=5>Vendredi</option>
                    <option value=6>Samedi</option>
                        
                        @break
                    @case(2)
                    <option value=1>Lundi</option>
                    <option selected value=2>Mardi</option>
                    <option value=3>Mercredi</option>
                    <option value=4>Jeudi</option>
                    <option value=5>Vendredi</option>
                    <option value=6>Samedi</option>
                     @break
                        @case(3)
                        <option value=1>Lundi</option>
                        <option  value=2>Mardi</option>
                        <option selected value=3>Mercredi</option>
                        <option value=4>Jeudi</option>
                        <option value=5>Vendredi</option>
                        <option value=6>Samedi</option>
                     @break
                     @case(4)
                            <option value=1>Lundi</option>
                            <option  value=2>Mardi</option>
                            <option value=3>Mercredi</option>
                            <option selected value=4>Jeudi</option>
                            <option value=5>Vendredi</option>
                            <option value=6>Samedi</option>
                     @break
                     @case(5)
                     <option value=1>Lundi</option>
                     <option  value=2>Mardi</option>
                     <option value=3>Mercredi</option>
                     <option value=4>Jeudi</option>
                     <option selected value=5>Vendredi</option>
                     <option value=6>Samedi</option>
                     @break
                     @case(6)
                     <option value=1>Lundi</option>
                     <option  value=2>Mardi</option>
                     <option value=3>Mercredi</option>
                     <option value=4>Jeudi</option>
                     <option value=5>Vendredi</option>
                     <option selected value=6>Samedi</option>
                         @break
                    @default
                    <option value=1>Lundi</option>
                    <option  value=2>Mardi</option>
                    <option value=3>Mercredi</option>
                    <option value=4>Jeudi</option>
                    <option value=5>Vendredi</option>
                    <option  value=6>Samedi</option>
                @endswitch
                        

                    </select>
            
            </div>
    
    </div>
    <div class="form-group">
        <label >Heure debut<span style="color: red">*</span>:</label>
        <input
            type="time"
            class="form-control form-control-lg"
            name="debutsean"
            
            value="{{$seance->debutsean}}"
            
        />
    </div>
    <div class="form-group">
        <label >Heure fin<span style="color: red">*</span>:</label>
        <input
            type="time"
            class="form-control form-control-lg"
            name="finsean"
            
            value="{{$seance->finsean}}"
        />
    </div>
    
    <div class="form-group">
        <label>Periode<span style="color: red">*</span></label>
        <select
           class=" form-control"
            
             name="periode"
        > @foreach ($filieres as $filiere)
            <optgroup label={{$filiere->nomfil}} >
            @foreach ($niveaux as $niveau)
            @foreach ($semestres as $semestre)
            @foreach ($periodes as $periode)
             @if ($niveau->idfil==$filiere->id && $niveau->id==$semestre->idn && $semestre->id==$periode->ids  )
             @if ($seance->idper == $periode->id )
             <option selected value={{$periode->id}}>{{$semestre->nomsem . '(' . $periode->debutperi .'/'. $periode->finperi .')'}}</option>
             @else
                    <option value={{$periode->id}}>{{$semestre->nomsem . '(' . $periode->debutperi .'/'. $periode->finperi .')'}}</option>
             @endif
              
             @endif
                @endforeach
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
        <a href="d/{{$seance->id}}" >
             Supprimer
        </a>
       
    </button>
  </div>
</form>
   </div>
</div>


@endsection