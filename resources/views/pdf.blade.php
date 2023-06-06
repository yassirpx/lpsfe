<head>
  <meta charset='UTF-8' />
  <title>Invoice PDF</title>
  <link rel='preconnect' href='https://fonts.googleapis.com' />
  <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin />
  <link href='https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800&display=swap' rel='stylesheet' />
</head>
<style>

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      
    }


    .text-grey {
      color: #60737D;
    }

    .invoice-items-table {
      margin-bottom: 10px;
    }

    .invoice-items-table tr th,
    .invoice-items-table tr td {
      padding: 8px 8px 8px 16px;
      border-bottom: 0.5px solid #EBEBEB;
    }

    .invoice-items-table tr th {
      text-align: left;
    }

    .invoice-items-table:nth-child(1) tr:last-child td {
      border-bottom: none;
    }

    .t-footer {
      padding: 8px 8px 8px 16px;
    }

    .t-footer>div {
      margin-bottom: 20px;
    }

    .flex {
      display: -webkit-box;
      display: -ms-flexbox;
      display: flex;
    }

    .justify-between {
      -webkit-box-pack: justify;
      -ms-flex-pack: justify;
      justify-content:
        space-between;
    }

    .align-center {
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
    }

    .flex-col {
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      -ms-flex-direction: column;
      flex-direction: column;
    }
    .page-break {
    page-break-after: always;
}
  </style>


<body style="  font-size:14px;padding: 30px;font-family: 'Raleway', sans-serif;">
  @php
  @endphp
  <div class='flex justify-between align-center' style='margin-bottom: 30px;'>
    <h3>Université Ibn Zohr</h3>
    <h4>  Ecole Supérieure de Technologie </h4>
     <h5> Guelmim</h5>
     @php
     $currentDateTime = date('Y-m-d');
 @endphp
    <p  style='line-height: 1.2;text-align: right; '>
      <span style='font-weight: 600;'>Facture No.</span>
      <span class='text-grey' >#{{$professeur->id}}</span>
      <p style='font-weight: 600;text-align: right;'>
         Le<span class='text-grey'> {{$currentDateTime}} </span></p>
    </p>
  </div>

  <div class='flex justify-between align-center' style='line-height: 1.7; margin-bottom: 30px;'>
    <div>
      <h3 style='font-weight: 600;'>{{$professeur->nom . ' ' .$professeur->prenom }}</h3>
      <h4 class='text-grey'>{{$professeur->CIN}}</h4>
      <p class='text-grey'>{{$professeur->adress}}</p>
      <p class='text-grey'>{{$professeur->telephone}}</p>
    </div>
  </div>

  <div class='invoice-items-container'>
    <table class='invoice-items-table' width='100%' style='border-collapse: collapse; margin-bottom: 45px;'>
      <colgroup>
        <col span='1' style='width: 252px;' />
        <col span='3' style='width: 95px;' />
      </colgroup>
      <thead style='background: #1d276b'>
        <tr>
          <th>Seance</th>
          <th style="color:azure; text-align: center;">Nombre des seance</th>
          <th style="color:azure; text-align: center;" >Prix par heure</th>
          <th style="color:azure; text-align: center;">Total</th>
        </tr>
      </thead>
      <tbody>
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
              <tr>
                <td style="color: #666666; font-weight: 500; line-height: 13px;">
                  <p style="margin-bottom: 8px; font-size: 14px;">{{$seance->nomsea}}</p>
                  <span style="font-size: 15px;">{{$periode->debutperi.'/'.$periode->finperi}}</span>
                </td>
                <td style='text-align: center;'>{{$seance->nsean}}</td>
                <td style='text-align: center;'>{{$professeur->prix_par_H." DH"}}</td>
                <td style='text-align: center;'>{{$ntsean .' DH'}}</td>
              </tr>
  @endif
     @endforeach   
     @endforeach 
     @endforeach
      
       
      </tbody>
    </table>

    <div class='t-footer' style='background: #1d276b; margin-bottom: 100px; padding: 20px;'>
      <div class='flex justify-between'  style='font-weight: 600;text-align: right;'>
        <p style='font-weight: 800;font-size:20px;text-align: left; color:azure;'>Facture No.:</p>
        <p style='font-weight: 500; font-size:18px; text-align: right;color:azure;'>#{{$professeur->id}}</p>
        <p style='font-weight: 800; font-size:20px;text-align: left; color:azure;'>Total:</p>
        <p style='font-weight: 500; font-size:18px; text-align: right;color:azure;'>{{$total." DH"}}</p>
      </div>
      <div class="flex justify-between">
      </div>
    </div>
  </div>
</body>