<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Facture</title>
</head>

<body>
    <style>
        @page {
            margin: 0;
        }

        table {
            margin: 10px auto;
            padding: 5px;
            height: auto;
            width: 85%;
            border-collapse: collapse;
        }

        .table2 td {
            padding: 10px;
        }

        .table2 .col-border {
            border: solid 1px gray;
        }

        label {
            width: 100px;
            text-decoration: underline;
            font-weight: normal !important;
            display: inline-block;
        }

        p {
            margin: 5px;
        }

        .header {
            border-bottom: double blue;
            padding-bottom: 10px;
        }

        .underline {
            text-decoration: underline;
        }

        .bold {
            font-weight: bold;
        }

        .footer {
            border-top: double blue;
            margin-top: 112px;
            line-height: 17px;
            font-size: 12px;
            text-align: center;
        }
    </style>

    <table class="header">
        <tr>
            <td colspan="2">
                <img style="width: 100px" src="{{public_path('/assets/dist/img/ordre.png')}}" alt="logo">
            </td>
            <td colspan="8" style="text-align: center;">
                <h3>ETUDE DE MAITRE LUCIE TIENDREBEOGO</h3>
            </td>
            <td colspan="2" style="text-align:right">
                <img style="width: 100px" src="{{public_path('/assets/dist/img/notaire.png')}}" alt="logo">
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
        </tr>
        <tr>
            <td colspan="8"></td>
            <td colspan="4" style="color: red; padding:10px 0">
                Facture N° {{GlobalHelpers::getToday().'/'.$prestation->id}}
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Dossier N° </td>
            <td colspan="8" class="bold">: {{$prestation->num_dossier}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Nature de l'acte </td>
            <td colspan="8" class="bold">: {{$prestation->parties_acte}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Base de calcul</td>
            <td colspan="8" class="bold">: {{$prestation->base_calcul}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Doit</td>
            <td colspan="8" class="bold">: {{$prestation->doit}}</td>
        </tr>
    </table>

    <table class="table2">
        <tr>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
            <td style="width: 8.33%"></td>
        </tr>
        <tr>
            <td colspan="8" class="col-border" style="text-align:center"><b>DESIGNATIONS</b></td>
            <td colspan="4" class="col-border" style="text-align:center"><b>MONTANT</b></td>
        </tr>
        <tr>
            <td colspan="8" class="col-border">I - DEBOURS(<em>au profit du tresor public</em>)</td>
            <td colspan="4" class="col-border" style="text-align:right; background-color:#ccc">
                <h3 style="margin: 0">{{$prestation->total_debours}} F</h3>
            </td>
        </tr>
        <tr>
            <td rowspan="2"></td>
            <td rowspan="2" colspan="3" class="col-border">
                - Timbres sur Etat
            </td>
            <td colspan="4" class="col-border">*Minute(400x59p)</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->minute}} F</td>
        </tr>
        <tr>
            <td colspan="4" class="col-border">*Expédition(400x12p)</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->minute}} F</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="7" class="col-border">- Etablissement du nouveau titre(PUH, PE, A)</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->nouveau_titre}} F
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="7" class="col-border">- Exploit d'huissier</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->exploit}} F</td>
        </tr>
        <tr>
            <td rowspan="4"></td>
            <td rowspan="4" colspan="3" class="col-border">
                - Droits d'enregistrement
            </td>
            <td colspan="4" class="col-border">*Droit fixe(6000)</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->droit_fixe}} F</td>
        </tr>
        <tr>
            <td colspan="4" class="col-border">*Vérification de titre</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->verif_titre}} F</td>
        </tr>
        <tr>
            <td colspan="4" class="col-border">*Insertion au journal d'annonce légale</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->insertion_journal}}
                F</td>
        </tr>
        <tr>
            <td colspan="4" class="col-border">*Frais CEFORE</td>
            <td colspan="4" class="col-border" style="text-align:right;">{{$prestation->cefore}} F</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="7" class="col-border"> Autres frais</td>
            <td colspan="4" style="text-align:right;" class="col-border">{{$prestation->autres}} F</td>
        </tr>
        <tr>
            <td colspan="8" class="col-border">II - HONORAIRES ET EMOLUMENTS</td>
            <td colspan="4" class="col-border" style="text-align:right; background-color:#ccc">
                <h3 style="margin: 0">{{$prestation->total_honoraires}} F</h3>
            </td>
        </tr>
        <tr>
            <td colspan="8" class="col-border">TVA(18% HONORAIRES ET EMOLUMENTS)</td>
            <td colspan="4" class="col-border" style="text-align:right; background-color:#ccc">
                <h3 style="margin: 0">{{$prestation->tva}} F</h3>
            </td>
        </tr>
        <tr>
            <td colspan="8" class="col-border">TOTAL GENERAL</td>
            <td colspan="4" class="col-border" style="text-align:right; background-color:#ccc">
                <h3 style="margin: 0">{{$prestation->total_general}} F</h3>
            </td>
        </tr>
    </table>
<p style="padding: 10px; margin-left:50px"> <u>
    @php
    $user = GlobalHelpers::getLoggedUser();
    echo ucwords($user->nom.' '.$user->prenoms);
    @endphp
</u>
</p>

    <table class="footer">
        <tfoot>
            <tr>
                <td colspan="12">
                    <em>
                        Ouagadougou - Cité 1200 Logements, dernier virage avant la station Shell (Av. Banbanguida)
                        en
                        venant de <br>
                        l'hôpital Saint Camille, 3è porte à gauche: Villa N°1038; <br>
                        11 BP 164 Ouaga CMS 11 - Tél: (+226) 25 36 81 71 / 60 05 04 09 / 79 42 44 75 / 57 75 90 90 - maitretiendrebeogo@gmail.com <br>
                        IFU N° 0011952F
                    </em>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>