@extends('index')
@section('content')
@php
	$stats=session('stats');
	$id=session('id');
@endphp

<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
<div class="card-box pb-10">
    <div class="card-box height-100-p ">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src={{asset("img/banner-img.png")}} alt="">
            </div>
            <div class="col-md-8">
                <h4 class="font-20 weight-500 mb-10 text-capitalize">
                    Bienvenue 
                    <div class="weight-600 font-30 text-blue">{{$user->nom  .' ' .$user->prenom }}</div>
                </h4>
                @php
                    $parags = array(
                      "Bienvenue à notre école! Nous sommes ravis de vous avoir comme étudiant et sommes impatients de vous aider à atteindre vos objectifs.",
                     "Bienvenue sur notre plateforme en ligne ! Nous sommes fiers de vous offrir une expérience unique et enrichissante.",
                     "Soyez le bienvenu ! Nous sommes heureux de vous offrir un espace où vous pourrez vous informer et échanger.",
                      "Nous sommes heureux de vous offrir un accueil chaleureux sur notre site ! Nous espérons que vous y trouverez ce que vous cherchez.",
                     "Soyez le bienvenu sur notre site web ! Nous sommes à votre disposition pour vous aider dans votre recherche d'informations.",
                     "Bienvenue sur notre plateforme ! Nous sommes à votre disposition pour vous aider à trouver les informations dont vous avez besoin.",
                         "Bienvenue à bord ! Nous sommes à votre disposition pour vous guider dans votre exploration de notre site web.",
                         "Soyez le bienvenu ! Nous sommes heureux de partager avec vous notre expertise et nos connaissances.",
                         "Soyez le bienvenu ! Nous sommes heureux de vous offrir un espace où vous pourrez vous informer et échanger.",
                        "Bienvenue sur notre plateforme en ligne ! Nous sommes fiers de vous offrir une expérience unique et enrichissante."   ,
                    "Nous sommes ravis de vous accueillir sur notre site web ! Nous espérons que vous y trouverez une mine de ressources utiles." );
                    $n=rand(0, 10);  
                    $parag = $parags[$n]
                @endphp
                <p class="font-18 max-width-600">
                   {{ $parag}}
                </p>
            </div>
        </div>
    </div> 
</div>
    </div>
</div>

            
@endsection