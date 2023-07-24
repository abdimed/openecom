<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1,
        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <title>Facture {{ $order->number }}</title>
</head>

<body>

    <h3>SARL CCBO IMPORTATION MDF / MELAMINE / HIGH GLOSS
        ET ACCESSOIRES DE DRESSING ET CUISINE</h3>

    <p>
        ccbo dar el beida
        <span>
            TEL : 0560-236-871 / 0555-017-182 / 0552-829-656 <br>
            Email : marketing@ccbo-dz.com <br>
            Site : www.ccbo-dz.com <br>
            Adresse : CitË GETAL N°15 DAR EL BEIDA,ORAN
        </span>
    </p>

    <hr>
    <h1>
        Bon de livraison {{ $order->number }}
    </h1>
    <section>
        <table>
            <tr>
                <th>N°</th>
                <th>code</th>
                <th>Designation</th>
                <th>UM</th>
                <th>Qte</th>
                <th>P.U. HT</th>*
                <th>Montant HT</th>
                <th>TVA</th>
            </tr>

            @foreach ($order->variations as $number => $variation)
                <tr>
                    <td>
                        {{ $number + 1 }}
                    </td>
                    <td>
                        {{ $variation->ref }}
                    </td>
                    <td>
                        {{ $variation->name }}
                    </td>
                    <td>

                    </td>
                    <td>
                        {{ $variation->pivot->qty }}
                    </td>
                    <td>
                        {{ $variation->price }} da
                    </td>
                    <td>
                        {{ $order->total_price }}
                    </td>
                </tr>
            @endforeach
        </table>
    </section>
</body>

</html>
