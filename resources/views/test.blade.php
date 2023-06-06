<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Download</title>
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
  <form  method="POST" action="/admin">       
  
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
            
        />
    </div>
  
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
    
    
  </div>
  <div class="modal-footer">
  
    <button type="submit" class="btn btn-primary">
        AJOUTER
    </button>

    
  </div>
</form>
   </div>
 

</body>
</html>
