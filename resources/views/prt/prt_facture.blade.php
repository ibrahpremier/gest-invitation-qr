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

        .signature {
            margin-top: 130px;
        }

        .footer {
            border-top: double blue;
            margin-top: 150px;
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
                Etat de frais N° {{GlobalHelpers::getToday().'/'.$prestation->id + GlobalHelpers::getStartNumber()}}
            </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Dossier N° </td>
            <td colspan="8" class="bold">: {{strtoupper($prestation->num_dossier)}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Nature de l'acte </td>
            <td colspan="8" class="bold">: {{$prestation->parties_acte}}</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Base de calcul</td>
            <td colspan="8" class="bold">: {{GlobalHelpers::formatPrice($prestation->base_calcul)}} FCFA</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td colspan="2" class="underline">Doit</td>
            <td colspan="8" class="bold">: {{strtoupper($prestation->doit)}}</td>
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
                <h3 style="margin: 0">{{GlobalHelpers::formatPrice($prestation->total_debours)}} <sup>FCFA</sup></h3>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="7" class="col-border">
                - Timbres sur Etat
            </td>
            <td colspan="4" class="col-border" style="text-align:right;">{{GlobalHelpers::formatPrice($prestation->total_timbre)}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="7" class="col-border">
                - Droits d'enregistrement
            </td>
            <td colspan="4" class="col-border" style="text-align:right;">{{GlobalHelpers::formatPrice($prestation->total_droit)}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="7" class="col-border">
                - Autres frais
            </td>
            <td colspan="4" class="col-border" style="text-align:right;">{{GlobalHelpers::formatPrice($prestation->total_autre)}}</td>
        </tr>
        <tr>
            <td colspan="8" class="col-border">II - HONORAIRES ET EMOLUMENTS</td>
            <td colspan="4" class="col-border" style="text-align:right; background-color:#ccc">
                <h3 style="margin: 0">{{GlobalHelpers::formatPrice($prestation->total_honoraires)}} <sup>FCFA</sup></h3>
            </td>
        </tr>
        <tr>
            <td colspan="8" class="col-border">TVA(18% HONORAIRES ET EMOLUMENTS)</td>
            <td colspan="4" class="col-border" style="text-align:right; background-color:#ccc">
                <h3 style="margin: 0">{{GlobalHelpers::formatPrice($prestation->tva)}} <sup>FCFA</sup></h3>
            </td>
        </tr>
        <tr>
            <td colspan="8" class="col-border">TOTAL GENERAL</td>
            <td colspan="4" class="col-border" style="text-align:right; background-color:#ccc">
                <h3 style="margin: 0">{{GlobalHelpers::formatPrice($prestation->total_general)}} <sup>FCFA</sup></h3>
            </td>
        </tr>
    </table>
    <br>
<p style="padding: 10px; margin-left:50px"> 
    Arrêté le présent état des frais à la somme de: ..............................................................................................<br><br>..........................................................................................................................................................................
</p>


    <table class="signature">
        <tr>
            <td colspan="6"> 
            <em>
                <u>
                @php
                $user = GlobalHelpers::getLoggedUser();
                echo ucwords($user->nom.' '.$user->prenoms);
                @endphp
            </u>

            </em>
            </td>
            <td colspan="6" style="text-align: right">
                <em>Ouagadougou le {{ date('d/m/Y', strtotime($prestation->updated_at))}} </em>
            </td>
        </tr>
    </table>

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
                        IFU N° 0011952F - RNI; CBI Compte N°0394259241010-07
                    </em>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>