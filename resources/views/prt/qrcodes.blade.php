<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Cartes d'invitations | 18 * 12.5 </title>
    <style>
@page {
  /* size: A4 landscape; */
  size: 680.31496063 472.44094488;
  margin: 0;
}


        .numero{
            /* position: absolute; */
            margin-top: -5px;
            font-size: small;
        }


        .qr_code{
            /* margin-left: 5%; */
            /* position: absolute; */
        }

        .qr_code img {
            height: 2.8cm;
        }




        .grid-item  {
            text-align: center;
            float: left;
            margin: 10px;
        }

        /* .grid-container  {
            display: grid;
            gap: 5px;
            grid-template-columns: auto auto;
            position: relative;
        } */

    </style>
</head>

<body>
    <div class="grid-container">
        @foreach ($invites as $invite)
            <div class="grid-item carte">
                    <div class="qr_code">
                        <img alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{urlencode(strtoupper($invite->nom)).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$invite->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/>
                    </div>

                    <div class="numero">9M{{ $invite->id }}</div>
                {{-- <img style="width: 100%" src="{{ asset('/assets/dist/img/crea-invit.jpg') }}" alt="logo"> --}}
            </div>
        @endforeach
    </div>
</body>

</html>
