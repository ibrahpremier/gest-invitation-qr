<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Carte d'invitation invité N°{{$invite->id}} </title>
</head>

<body>
    <style>
        @page {
            margin: 0;
        }
        .qr_code{
            margin: 20px 0 0 80px;
            height: 90px;
            position:fixed
        }

        .numero{
            top: 20px;
            position:fixed;
        }

    </style>

<img style="width: 100%" src="{{public_path('/assets/dist/img/crea-invit.jpg')}}" alt="logo">
<img class="qr_code" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{strtoupper($invite->nom.'+'.$invite->prenom).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$invite->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/>

<div class="numero"> 9M{{$invite->id}}</div>
</body>

</html>