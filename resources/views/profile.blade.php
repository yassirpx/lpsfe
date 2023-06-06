@extends('index')
@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Profile</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Profile
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
<div class="card-box pb-10">
            <div class="pd-20 card-box height-100-p">
                <div class="task-title row align-items-center">
                    <div class="col-md-8 col-sm-12">
                    </div>
                    <div class="col-md-4 col-sm-12 text-right">
                        <a
                            href="task-add"
                            data-toggle="modal"
                            data-target="#task-add"
                            class="bg-light-blue btn text-blue weight-500"
                            >  Plus  <i class="fa-solid fa-plus">  </i> </a
                        >
                    </div>
                </div>
                <div class="profile-photo">
                    <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                    <img   src={{asset('img/'.$user->photo)}} alt="" class="avatar-photo">
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body pd-5">
                                    <div class="img-container">
                                        <img id="image" src={{asset('img/'.$user->photo)}} alt="Picture" class="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="text-center h5 mb-0">{{$user->nom  .' ' .$user->prenom }}</h5>
                <p class="text-center text-muted font-14">
                    {{session('stats')}}
                </p>
                <div class="profile-info">
                    <h5 class="mb-20 h5 text-blue">Mes Informations</h5>
                    <ul>
                        <li>
                            <span>CIN:</span>
                            {{$user->CIN}}
                        </li>
                        @if (session("stats")=="Etudiant")
                        <li>
                            <span>CNE:</span>
                            {{$user->CNE}}
                        </li>
                        @endif
                        <li>
                            <span>Nom d'utilisateur:</span>
                            {{$user->email}}
                        </li>
                        @if (!empty($user->genre))
                        <li>
                            <span>Genre:</span>
                            {{$user->genre}}
                        </li>
                        @endif
                        <li>
                            <span>Phone Number:</span>
                            {{$user->telephone}}
                        </li>
                        @if (!empty($user->datenaissance))
                        <li>
                            <span>Date de naissance:</span>
                            {{$user->datenaissance}}
                        </li>
                    @endif
                        @if (session("stats")=="Professeur" && !empty($user->gmail) )
                        <li>
                            <span>Gmail:</span>
                            {{$user->gmail}}
                        </li>
                        @endif
                        <li>
                            <span>Address:</span>
                            {{$user->adress}}
                        </li>
                    </ul>
                </div>
              
            </div>
        </div>
                            <div
															class="modal fade customscroll"
															id="task-add"
															tabindex="-1"
															role="dialog"
														>
															<div
																class="modal-dialog modal-dialog-centered"
																role="document"
															>
																<div class="modal-content">
																	<div class="modal-header">
																		<h5
																			class="modal-title"
																			id="exampleModalLongTitle"
																		>
																			Mes information
																		</h5>
																		<button
																			type="button"
																			class="close"
																			data-dismiss="modal"
																			aria-label="Close"
																			data-toggle="tooltip"
																			data-placement="bottom"
																			title=""
																			data-original-title="Close Modal"
																		>
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body pd-0">
																		<div class="task-list-form">
																			<ul>
																				<li>
																					<form method="POST"  enctype="multipart/form-data"  action="/profile/{{session("id")}}"   >
                                                                                        @csrf
																						<div class="form-group row">
																							<label class="col-md-4"
																								>Nom complete</label
																							>
																							<div class="col-md-8">
																								<input
																									type="text"
																									class="form-control"
                                                                                                   value="{{$user->nom  .' ' .$user->prenom }}"
                                                                                                    readonly
																								/>
																							</div>
																						</div>
																						<div class="form-group row">
																							<label class="col-md-4"
																								>Nom d'utilisateur</label
																							>
																							<div class="col-md-8">
																								<input
																									type="text"
																									class="form-control"
                                                                                                    readonly
                                                                                                    value="{{$user->email}}"
																								/>
																							</div>
																						</div>
                                                                                        @if (session("stats")=="Professeur" || session("stats")=="Etudiant" )
																						<div class="form-group row">
																							<label class="col-md-4"
																								>Genre</label
																							>
																							<div class="col-md-8">
																								<select
																									class="selectpicker form-control"
																									data-style="btn-outline-primary"
																									title="Genre"
                                                                                                    required
                                                                                                    name="genre"
																								>
                                                                                                @if ($user->email=='Female')
                                                                                                    <option >Male</option>
																									<option selected>Female</option>
                                                                                                @else
                                                                                                <option selected>Male</option>
                                                                                                <option >Female</option>
                                                                                                @endif
																									
																					
																								</select>
																							</div>
																						</div>
																						<div class="form-group row ">
																							<label class="col-md-4"
																								>Date de naissance</label
																							>
																							<div class="col-md-8">
																								<input
																									type="text"
																									class="form-control date-picker"
                                                                                                    value="{{$user->datenaissance}}"
                                                                                                    required
                                                                                                    name="datenaissance"
																								/>
																							</div>
																						</div>
                                                                                    	<div class="form-group row">
																							<label class="col-md-4"
																								>Address</label
																							>
																							<div class="col-md-8">
																								<input
																									type="text"
																									class="form-control"
                                                                                                    value="{{$user->adress}}"
                                                                                                    required
                                                                                                    name="adress"
																								/>
																							</div>
																						</div>
                                                                                        <div class="form-group row">
																							<label class="col-md-4"
																								>Telephone</label
																							>
																							<div class="col-md-8">
																								<input
																									type="text"
																									class="form-control"
                                                                                                    value=" {{$user->telephone}}"
                                                                                                    required
                                                                                                    name="telephone"
																								/>
																							</div>
																						</div>
                                                                                        @if (session("stats")=="Professeur")
                                                                                        <div class="form-group row">
																							<label class="col-md-4"
																								>Gmail</label
																							>
																							<div class="col-md-8">
																								<input
																									type="email"
																									class="form-control"
                                                                                                    value=" {{$user->gmail}}"
                                                                                                    required
                                                                                                    name="gmail"
																								/>
																							</div>
																						</div>
                                                                                        @endif
																					    @endif
																						<div class="form-group row">
																							<div class="button-wrapper">
                                                                                                <span class="label">
                                                                                                 Photo profile
                                                                                                </span>
                                                                                                
                                                                                                  <input type="file"
                                                                                                   
                                                                                                   id="upload" 
                                                                                                  class="upload-box" 
                                                                                                  required
                                                                                                  name="photo"
                                                                                                  accept="image/*"
                                                                                                 >
                                                                                                
                                                                                              </div>
																						 </div>
																					
																				</li>
																			</ul>
																		</div>
																
																	</div>
																	<div class="modal-footer">
																		<button
																			type="submit"
																			class="btn btn-primary"
																		>
                                                                        Modifier
																		</button>
																	</form>
																	</div>
																</div>
															</div>
														</div>
                    </div>
                </div>
            </div>
        </div>
  
</div>
@endsection