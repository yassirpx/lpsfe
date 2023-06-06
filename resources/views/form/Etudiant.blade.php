@extends('index')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        @if (empty($etudiant) )
                          <h4>Ajouter</h4>  
                        @else
                        <h4>Editer</h4>
                        @endif
                        
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Etudiant
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
   
    @if (!empty($etudiant))  
    <form  method="POST" action="/etudiant/{{$etudiant->id}}">
                @else
                 <form  method="POST" action="/etudiant">       
                @endif
                
                    @csrf
              <div class="modal-body">
                
                <div class="form-group">
                    <label>Nom<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Nom"
                        name="nom"
                        required
                      @if (!empty($etudiant))
                       value={{$etudiant->nom}} 
                      @endif
                    />
                </div>
                <div class="form-group">
                    <label>Prenom<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Prenom"
                        name="pnom"
                        required
                        @if (!empty($etudiant))
                        value={{$etudiant->prenom}} 
                       @endif
                    />
                </div>
                <div class="form-group">
                    <label>CIN<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="CIN"
                        name="CIN"
                        required
                        @if (!empty($etudiant))
                        value={{$etudiant->CIN}} 
                       @endif
                    />
                </div>
                <div class="form-group">
                    <label>CNE<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="CNE"
                        name="CNE"
                        required
                        @if (!empty($etudiant))
                        value={{$etudiant->CNE}} 
                       @endif
                    />
                </div>
                <div class="form-group">
                    <label>Address<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Address"
                        name="adress"
                        required
                        @if (!empty($etudiant))
                        value={{$etudiant->adress}} 
                       @endif
                    />
                </div>
                <div class="form-group">
                    <label>Telephone<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Telephone"
                        name="telephone"
                        required
                        @if (!empty($etudiant))
                        value={{$etudiant->telephone}} 
                       @endif
                    />
                </div>
                <div class="form-group">
                    <label>Email<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Email"
                        name="email"
                        required
                        @if (!empty($etudiant))
                        value={{$etudiant->email}} 
                       @endif
                    />
                </div>
                @if (empty($etudiant))
                    <div class="form-group">
                    <label>Mot de passe<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Mot de passe"
                        name="password"
                        required
                    />
                </div>
                @endif
                
                <div class="form-group">
                    <label style=>Niveau<span style="color: red">*</span></label>
                    <select
                        class=" form-control"
                        style="width: 100%;"
                        required
                         name="niveau"
                    > @foreach ($filieres as $filiere)
                        <optgroup label={{$filiere->nomfil}} >
                        @foreach ($niveaux as $niveau)
                         @if ($niveau->idfil==$filiere->id)
                         @if (!empty($etudiant) && $niveau->id==$etudiant->idn)
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
              <div class="modal-footer">
                @if (empty($etudiant))
                <button type="submit" class="btn btn-primary">
                    AJOUTER
                </button>
            @else
            <button type="submit" class="btn btn-warning">
                Mise a jour
            </button>
            <button type="submit" class="btn btn-danger">
                Supprimer
            </button>
                
            @endif
                
              </div>
            </form>
               </div>
        </div>
    </div>


@endsection