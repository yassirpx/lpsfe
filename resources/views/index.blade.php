@php
	$stats=session('stats');
	$id=session('id');
@endphp
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<meta charset="utf-8" />
		<title>ESTG</title>

		<!-- Site favicon -->
		<link
		rel="apple-touch-icon"
		sizes="180x180"
		href={{asset('img/pxESTG.png')}}
	/>
	<link
		rel="icon"
		type="image/png"
		sizes="32x32"
		href={{asset('img/pxESTG.png')}}
	/>
	<link
		rel="icon"
		type="image/png"
		sizes="16x16"
		href={{asset('img/pxESTG.png')}}
	/>
		

		<!-- Mobile Specific Metas -->
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1"
		/>

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href={{asset('css/core.css')}} />
		<link
			rel="stylesheet"
			type="text/css"
			href={{asset('css/dataTables.bootstrap4.min.css')}}
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href={{asset('css/responsive.bootstrap4.min.css')}}
		/>
		<link rel="stylesheet" type="text/css"  href={{asset('css/style.css')}} />
		<link rel="stylesheet" type="text/css"  href={{asset('css/px.css')}} />
		<link
			rel="stylesheet"
			type="text/css"
			
			href={{asset('css/sweetalert2.css')}}/>

        <script src={{asset('js/index.global.js')}}></script>  
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="https://kit.fontawesome.com/92c2a58f3a.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		
		
		
			
	</head>
	<body>
		<div class="pre-loader">
			<div class="pre-loader-box">
				<div class="loader-logo">
					<img src={{asset('img/pxESTG.png')}} width="175px"/>
				</div>
				<div class="loader-progress" id="progress_div">
					<div class="bar" id="bar1"></div>
				</div>
				<div class="percent" id="percent1">0%</div>
				<div class="loading-text">chargement...</div>
			</div>
		</div>

		<div class="header" style="m">
			<div class="header-left">
				<div class="menu-icon bi"><i class="fa-solid fa-bars" style="color: #646568;"></i></div>
				@if ($stats=="Admin")
				<div class="header-search">
					<div class="container">
								<div class="form-group mb-0">
									<input type="text" name="search" id="search" placeholder="Recherche........." class="form-control search-input" onfocus="this.value=''">
                                    <div class="dropdown">
										<a
											class="dropdown-toggle no-arrow"
											href="#"
											role="button"
											data-toggle="dropdown"
										>
											<span class="micon bi "><i class="fa-solid fa-magnifying-glass"></i></span
											>
										</a>
										<div class="dropdown-menu dropdown-menu-right">
										<div id="search_list"></div>
										</div>
								</div>
								
							</div>
							<div class="col-lg-3"></div>
			
			
						
					</div>
				</div>
					@endif
			</div>
			<div class="header-right" >
				
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
						<i class="fa-solid fa-gear"></i>
						</a>
					</div>
				
				</div>
			</div>
		</div>
		<div class="right-sidebar">
			<div class="sidebar-title">
				<h3 class=" text-center weight-600 font-16 text-blue">
					Parametre
					
				</h3>
				<div class="close-sidebar" data-toggle="right-sidebar-close">
					<i class="fa-solid fa-xmark"></i>
				</div>
			</div>
			<div class="right-sidebar-body customscroll">
				<div class="right-sidebar-body-content">
					<h4 class="weight-600 font-18 pb-10">Arrière-plan de l'en-tête</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-white "
							><i class="fa-solid fa-sun"></i></a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary header-dark"
							><i class="fa-solid fa-moon"></i></a
						>
					</div>

					<h4 class="weight-600 font-18 pb-10">Arrière-plan de la barre latérale</h4>
					<div class="sidebar-btn-group pb-30 mb-10">
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-light"
							><i class="fa-solid fa-sun"></i></a
						>
						<a
							href="javascript:void(0);"
							class="btn btn-outline-primary sidebar-dark"
							><i class="fa-solid fa-moon"></i></a
						>
					</div>

					
					
				</div>
			</div>
		</div>
		

		<div class="left-side-bar">
			<div class="brand-logo" style="margin-left: 15px">
				<a href="/">
					<img src="{{asset('img/logo_ESTG.png')}}" alt=""  style="margin-left: 15px" />
				</a>
				<div class="close-sidebar" data-toggle="left-sidebar-close">
					<i class="ion-close-round"></i>
				</div>
			</div>
			<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						<li class="dropdown">
							<a href="/" class="dropdown-toggle no-arrow">
								<span class="micon bi"><i class="fa-solid fa-house"></i></span
								><span class="mtext">Dashboard</span>
							</a>
							
						</li>
						@if ($stats=="Admin")

						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-solid fa-users"></i></span
								><span class="mtext">Utilisateur</span>
							</a>
							<ul class="submenu">
								<li class="dropdown">
									<a href="/professeurs" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-user fa-fade"></i></span
										><span class="mtext">Professeur</span>
									</a>
									
								</li>
								<li class="dropdown">
									<a href="/etudiants" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-user fa-fade"></i></span
										><span class="mtext">Etudiant</span>
									</a>
								</li>
							</ul>
						</li>
						
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon bi"><i class="fa-solid fa-book-open"></i></span
								><span class="mtext">Systeme Scolaire</span>
							</a>
							<ul class="submenu">
								<li class="dropdown">
									<a href="/annees" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
										><span class="mtext">Annee</span>
									</a>
									
								</li>
								<li class="dropdown">
									<a href="/formations" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
										><span class="mtext">Formation</span>
									</a>
								</li>
							
							<li class="dropdown">
								<a href="/filieres" class="dropdown-toggle no-arrow">
									<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
									><span class="mtext">Filiere</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="/niveaux" class="dropdown-toggle no-arrow">
									<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
									><span class="mtext">Niveau</span>
								</a>
							</li>
							<li class="dropdown">
								<a href="/semestres" class="dropdown-toggle no-arrow">
									<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
									><span class="mtext">Semestre</span>
								</a>
								
							</li>
						
						<li class="dropdown">
									<a href="/modules" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
										><span class="mtext">Module</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="/elements" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
										><span class="mtext">Element</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow ">
								<span class="micon bi "><i class="fa-regular fa-calendar-days fa-lg"></i></span
								><span class="mtext">Emploi Du Temps</span>
							</a>
							<ul class="submenu">
								<li class="dropdown">
									<a href="/calendrier" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
										><span class="mtext">Calendrier</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="/periodes" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
										><span class="mtext">Periode</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="/seances" class="dropdown-toggle no-arrow">
										<span class="micon bi "><i class="fa-solid fa-minus fa-fade fa-lg"></i></span
										><span class="mtext">Seance</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-regular fa-address-card"></i></span
								><span class="mtext"> Gestion Personnalisé </span>
							</a>
                      <ul class="submenu">
						<li class="dropdown">
							<a href="javascript:;" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-solid fa-wallet"></i></span
								><span class="mtext"> Salaire </span>
							</a>
							<ul class="submenu">
								<a href="/enattend" class="dropdown-toggle no-arrow">
									<span class="micon bi "><i class="fa-solid fa-clock-rotate-left fa-fade"></i></span
									><span class="mtext">En Attente</span></a>
								
								<a href="/eteverse" class="dropdown-toggle no-arrow">
									<span class="micon bi"><i class="fa-regular fa-clock fa-fade"></i></span
									><span class="mtext">Eté Versé</span>
								</a>
								
							</ul>
						</li>
						</ul>
					
						</li>
						<li>
							<div class="dropdown-divider" style="margin-top: 200px"></div>
						</li>
	
						@else 
						@if ($stats=="Professeur")
						<li class="dropdown">
							<a href="/mesetudiants" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-solid fa-users"></i></span
								><span class="mtext">Etudiant</span>
							</a>
						<li class="dropdown">
							<a href="/moncalendrier" class="dropdown-toggle no-arrow ">
								<span class="micon bi "><i class="fa-regular fa-calendar-days fa-lg"></i></span
								><span class="mtext">Emploi Du Temps</span>
							</a>
						</li>
						
						<li>
							<div class="dropdown-divider" style="margin-top: 310px"></div>
						</li>

							
						@else
						@if ($stats=="Etudiant")
						<li class="dropdown">
							<a href="/mesprofesseur" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-solid fa-user-tie"></i></span
								><span class="mtext">Professeur</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="/mescollegues" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-solid fa-user-group"></i></span
								><span class="mtext">Etudiant</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="/mescalendrier" class="dropdown-toggle no-arrow ">
								<span class="micon bi "><i class="fa-regular fa-calendar-days fa-lg"></i></span
								><span class="mtext">Emploi Du Temps</span>
							</a>
						</li>
						
						<li>
							<div class="dropdown-divider" style="margin-top: 250px"></div>
						</li>	




						@endif
						@endif
						@endif
						
						<li>
							<div class="mtext sidebar-small-cap ">  Autre</div>
							
						</li>
						<li>
							<a href="/profile/{{$id}}" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-regular fa-user"></i></span
								><span class="mtext">Profile</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="/logout" class="dropdown-toggle no-arrow">
								<span class="micon bi "><i class="fa-solid fa-arrow-right-from-bracket"></i></span
								><span class="mtext"> Se déconnecter </span>
							</a>
						
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			
				@yield('content')
				
			</div>
		</div>
		<!-- js -->
		<script src={{asset('js/core.js')}}></script>
		<script src={{asset('js/script.min.js')}}></script>
		<script src={{asset('js/px.js')}}></script>
		<script src={{asset('js/layout-settings.js')}}></script>
		<script src={{asset('js/process.js')}}></script>

		<script>
            $(document).ready(function(){
             $('#search').on('keyup',function(){
                 var query= $(this).val();
                 $.ajax({
                    url:"/search",
                    type:"GET",
                    data:{'search':query},
                    success:function(data){
                        $('#search_list').html(data);
                    }
             });
             //end of ajax call
            });
            });
        </script>
		
		
		
	</body>
</html>

