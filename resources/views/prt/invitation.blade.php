<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Carte d'invitation invité @if(isset($invite)) N°{{$invite->id}} @endif  </title>
</head>

<body>
    <style>
        @page {
            margin: 0;
            size: 18cm 12.5cm;
        }
        .qr_code{
            margin: 20px 0 0 80px;
            height: 100px;
            position:fixed
        }

        .numero{
            top: 20px;
            position:fixed;
        }

    </style>

<img style="width: 100%" src="{{public_path('/assets/dist/img/crea-invit.jpg')}}" alt="Invitation">
@if(isset($invite))
{{-- <img class="qr_code" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{strtoupper($invite->nom.'+'.$invite->prenom).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$invite->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/> --}}

<img class="qr_code" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{urlencode(strtoupper($invite->nom)).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$invite->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/>

<div class="numero"> 9M{{$invite->id}}</div>
@endif
</body>

</html>