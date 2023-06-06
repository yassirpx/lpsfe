@extends('index')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        @if (empty($professeur) )
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
                                Professeur
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
   
    @if (!empty($professeur))  
    <form  method="POST" action="/professeur/{{$professeur->id}}">
                @else
                 <form  method="POST" action="/professeur">       
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
             
                        @if (!empty($professeur))
                        value={{$professeur->nom}} 
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
                    
                        @if (!empty($professeur))
                        value={{$professeur->prenom}} 
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
                   
                        @if (!empty($professeur))
                        value={{$professeur->CIN}} 
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
                        @if (!empty($professeur))
                        value={{$professeur->adress}} 
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
             
                        @if (!empty($professeur))
                        value={{$professeur->telephone}} 
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
                    
                        @if (!empty($professeur))
                        value={{$professeur->email}} 
                       @endif
                    />
                </div>
                @if (empty($professeur) )
                     <div class="form-group">
                    <label>Mot de passe<span style="color: red">*</span></label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Mot de passe"
                        name="password"
            
                    />
                </div>
                @endif
               
               
                <div class="form-group">
                    <label >Genre<span style="color: red">*</span></label>
                   
                        <select
                        class=" form-control"
                         name="type"
                    >    
                            <option value='permanent'>Permanent</option> 
                            <option value='enattend'>Vacataire</option> 
                        </select> 
                </div> 
                @if (!empty($professeur->prix_par_H) || empty($professeur))
                <div class="form-group">
                    <label >Prix par heure<span style="color: red">*</span></label>
                    <input
                        type="number"
                        class="form-control"
                        placeholder="Prix par heure"
                        name="prix_H"
                        @if (!empty($professeur))
                        value={{$professeur->prix_par_H}}
                       @endif
                       
                    />
                </div>
                @endif
              </div>
              <div class="modal-footer">
            
                @if (empty($professeur))
                <button type="submit" class="btn btn-primary">
                    AJOUTER
                </button>
            @else
            <button type="submit" class="btn btn-warning">
                Mise a jour
            </button>
            <button type="submit" class="btn btn-danger">
                <a href="d/{{$professeur->id}}" >
                    Supprimer
               </a>
            </button>
                
            @endif
              </div>
            </form>
               </div>
        </div>
    </div>


@endsection