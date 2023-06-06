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
    <body >
	


        <div
			class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20"
		>
			<div class="pd-10">
				<div class="error-page-wrap text-center">
					<h1>403</h1>
					<h3>Error: 403 Forbidden</h3>
					<p>
						Désolé, l'accès à cette ressource sur le serveur est refusé.
                         <br />Soitvérifier l'URL
					</p>
					<div class="pt-20 mx-auto max-width-200">
						<a href="/" class="btn btn-primary btn-block btn-lg"
							>Retour à l'accueil</a
						>
					</div>
				</div>
			</div>
		</div>
		
		
	</body>
</html>