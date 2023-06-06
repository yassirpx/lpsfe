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
			href="{{asset('css/responsive.bootstrap4.min.css')}}"
		/>
		<link rel="stylesheet" type="text/css"  href={{asset('css/style.css')}} />
		<link rel="stylesheet" type="text/css"  href={{asset('css/px.css')}} />

        <script src={{asset('js/index.global.js')}}></script>  
		<script src="https://kit.fontawesome.com/92c2a58f3a.js" crossorigin="anonymous"></script>
				
	</head>
    <body class="login-page sidebar-shrink">
		
		
		<div
			class="login-wrap d-flex align-items-center flex-wrap justify-content-center"
		>
			<div class="container" >
				<div class="row align-items-center">
					<div class="col-md-6 col-lg-7" >
						<img src="{{asset('img/logo_ESTG.png')}}" alt=""/>
					</div>
					<div class="col-md-6 col-lg-5">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">Identifiez-vous</h2>
							</div>
							<!-- FOOOOOOOOOOOOOOOOOOOORM -->
							<form  method="POST" action="/login">
								@csrf
								@if ($errors->has('email'))
							 <div class="form-group has-danger">
								<input
									type="text"
									class="form-control form-control-lg form-control-danger"
									placeholder="Nom d'utilisateur"
									name="email"
								/>
								<div class="form-control-feedback">{{ $errors->first('email') }}</div>
							</div>
                             @else
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Nom d'utilisateur"
										name="email"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="fa-solid fa-user"></i></span>
									</div>
								</div>
								@endif
								@if ($errors->has('password'))
								<div class="form-group has-danger">
								   <input
									   type="text"
									   class="form-control form-control-lg form-control-danger"
									   placeholder="Mot de passe"
									   name="password"
								   />
								   <div class="form-control-feedback">{{ $errors->first('password') }}</div>
							   </div>
								@else
								<div class="input-group custom" >
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Mot de passe"
										name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="fa-solid fa-lock"></i></span>
									</div>
								</div>
								@endif
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0" >
											
											
											<input class="btn btn-primary btn-lg btn-block"  type="submit" value="Connexion">
										
											
										
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- js -->
		<script src={{asset('js/core.js')}}></script>
		<script src={{asset('js/script.min.js')}}></script>
		<script src={{asset('js/px.js')}}></script>
		
		
	</body>
</html>

