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
                                Seance
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
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true"
                >
                    ×
                </button>
            </div>
            <form  method="POST" action="/seance">
                    @csrf
              <div class="modal-body">
                <div class="form-group">
                    <label >Seance<span style="color: red">*</span>:</label>
                    
                        <select
                        class=" form-control"
                        required
                         name="nom"
                    >
                            @foreach ($elements as $element)
                            <optgroup label={{$element->nomelement}} >
                            <option value={{$element->nomelement.' Cour'}}>Cour</option>
                            <option value={{$element->nomelement.' TP'}}>Travaux Pratique</option>
                        </optgroup>
                            @endforeach
                            
                        </select>
                        <div class="form-group">
                            <label >Jour<span style="color: red">*</span>:</label>
                            
                                <select
                                class=" form-control"
                                required
                                 name="day"
                            >
                                    <option value=1>Lundi</option>
                                    <option value=2>Mardi</option>
                                    <option value=3>Mercredi</option>
                                    <option value=4>Jeudi</option>
                                    <option value=5>Vendredi</option>
                                    <option value=6>Samedi</option>

                                </select>
                        
                        </div>
                
                </div>
                <div class="form-group">
                    <label >Heure debut<span style="color: red">*</span>:</label>
                    <input
                        type="time"
                        class="form-control form-control-lg"
                        name="debutsean"
                        required
                        
                    />
                </div>
                <div class="form-group">
                    <label >Heure fin<span style="color: red">*</span>:</label>
                    <input
                        type="time"
                        class="form-control form-control-lg"
                        name="finsean"
                        required
                    />
                </div>
                
                <div class="form-group">
                    <label>Periode<span style="color: red">*</span></label>
                    <select
                       class=" form-control"
                        required
                         name="periode"
                    > @foreach ($filieres as $filiere)
                        <optgroup label={{$filiere->nomfil}} >
                        @foreach ($niveaux as $niveau)
                        @foreach ($semestres as $semestre)
                        @foreach ($periodes as $periode)
                         @if ($niveau->idfil==$filiere->id && $niveau->id==$semestre->idn && $semestre->id==$periode->ids  )
                             <option value={{$periode->id}}>{{$semestre->nomsem . '(' . $periode->debutperi .'/'. $periode->finperi .')'}}</option>
                         @endif
                            @endforeach
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
                <th>Seance</th>
                <th>Jour</th>
                <th>time Debut</th>
                <th>time Fin</th>
                <th>Periode</th>
                <th class="datatable-nosort">Plus</th>
            </tr>
        </thead>
        <tbody>
       
            @foreach ($seances as $seance)
            <tr>
                <td class="table-plus">
                    <div class="name-avatar d-flex align-items-center">
                        <div class="txt">
                            <div class="weight-600">{{$seance->id}}</div>
                        </div>
                    </div>
                </td>
                <td>{{$seance->nomsea}}</td>
                @switch($seance->daysean)
                @case(1)
                <td>Lundi</td>  
                    @break
                @case(2)
                <td>Mardi</td>
                 @break
                    @case(3)

                    <td>Mercredi</td>
                    
                 @break
                 @case(4)
                        <td>Jeudi</td> 
                 @break
                 @case(5)
            
                 <td>Vendredi</td>
              
                 @break
                 @case(6)
                 <td>Samedi</td>
                     @break
                @default
              
            @endswitch
                <td>{{$seance->debutsean}}</td>
                <td>{{$seance->finsean}}</td>
                
                 @php
                    $semestre = $semestres->find($seance->idper);
                @endphp
                <td> {{ $periode->debutperi .'/'. $periode->finperi }}</td>
                <td>
                    <div class="table-actions">
                        <a href="seance/{{$seance->id}}" data-color="#265ed7"
                            ><i class="fa-solid fa-pencil"></i></a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection