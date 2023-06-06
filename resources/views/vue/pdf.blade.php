<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Download</title>
</head>
<body>
    <div class="invoice-wrap">
        <div class="invoice-box">
          <div class="invoice-header">
            
              <div class="brand-logo" style="margin-left: 475px" >
              <img src="{{asset('img/logo_ESTG.png')}}" alt=""/>
              </div>
          
          </div>
          <h4 class="text-center mb-30 weight-600">Facture</h4>
          <div class="row pb-30">
            <div class="col-md-6">
              <h5 class="mb-15">{{$professeur->nom . ' ' .$professeur->prenom }}</h5>
              <p class="font-14 mb-5">
                @php
                    $currentDateTime = date('Y-m-d');
                @endphp
                Date Issued: <strong class="weight-600">{{$currentDateTime}}</strong>
              </p>
              <p class="font-14 mb-5">
                Invoice No: <strong class="weight-600">{{$professeur->id}}</strong>
              </p>
            </div>
            <div class="col-md-6">
              <div class="text-right">
                <p class="font-14 mb-5">{{$professeur->CIN}}</p>
                <p class="font-14 mb-5">{{$professeur->telephone}}</p>
                <p class="font-14 mb-5">{{$professeur->adress}}</p>
              </div>
            </div>
          </div>
          <div class="invoice-desc pb-30">
            <div class="invoice-desc-head clearfix">
              <div class="invoice-sub">Seances</div>
              <div class="invoice-rate">Prix par heure</div>
              <div class="invoice-hours">Nombre des seances</div>
              <div class="invoice-subtotal">total</div>
            </div>
            <div class="invoice-desc-body">
              <ul>
                @php
                    $total=0
                @endphp
                @foreach ($elements as $element)
                @foreach ($periodes as $periode)
                 @foreach ($seances as $seance)
                 @if ($professeur->id==$element->idp && $element->id==$periode->idele && $periode->id==$seance->idper )
                        @php          
                            $ntsean=0;
                            $ntsean=$professeur->prix_par_H*$seance->nsean;   
                            $total=$ntsean+$total      
                        @endphp 
                         <li class="clearfix">
                          <div class="invoice-sub">{{$seance->nomsea}}</div>
                          <div class="invoice-rate">{{$professeur->prix_par_H."DH"}}</div>
                          <div class="invoice-hours">{{$seance->nsean}}</div>
                          <div class="invoice-subtotal">
                            <span class="weight-600">{{$ntsean .'DH'}}</span>
                          </div>
                        </li>
              @endif
                 @endforeach   
                 @endforeach 
                 @endforeach
               
               
              </ul>
            </div>
            <div class="invoice-desc-footer">
              <div class="invoice-desc-head clearfix">
                <div class="invoice-sub">Bank Info</div>
                <div class="invoice-rate">Due By</div>
                <div class="invoice-subtotal">Total Due</div>
              </div>
              <div class="invoice-desc-body">
                <ul>
                  <li class="clearfix">
                    <div class="invoice-sub">
                      <p class="font-14 mb-5">
                        CIN:
                        <strong class="weight-600">{{$professeur->CIN}}</strong>
                      </p>
                      <p class="font-14 mb-5">
                        Code: <strong class="weight-600">{{$professeur->id}}</strong>
                      </p>
                    </div>
                    <div class="invoice-rate font-20 weight-600">
                     {{$currentDateTime}}
                    </div>
                    <div class="invoice-subtotal">
                      <span class="weight-600 font-24 text-danger"
                        >{{$total}}</span
                      >
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <h4 class="text-center pb-20">Thank You!!</h4>
        </div>
      </div>
</body>
</html>
