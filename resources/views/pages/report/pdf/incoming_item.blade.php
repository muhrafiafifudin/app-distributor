<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print PDF</title>
    <style>
        body {
            padding-left: 30px;
            padding-right: 30px;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <table width="100%" style="border: none">
        <tr style="border: none">
            <td width="30%" style="border: none">
                <img src="users/img/logo-nasa.png" alt="navbar brand" width="300px">
            </td>
            <td width="70%" style="border: none; line-height:10px">
                <h2 class="text-center">STOKIST NASA</h2>
                <p class="text-center">Sidomulyo, Kel. Glagah Wangi, Kec. Polanharjo, 57456. Klaten, Jawa Tengah</p>
            </td>
        </tr>
    </table>

    <h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Penjualan Produk</h3>
    <p class="text-center" style="line-height: 10px; margin-bottom: 3rem">Dari Tanggal : {{ date('d M Y', strtotime($fromDate)) }} Sampai Tanggal : {{ date('d M Y', strtotime($toDate)) }}</p>

    <table width="100%">
        <tr>
            <th>No.</th>
            <th>Nama Pelanggan</th>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Qty</th>
        </tr>
    </table>
</body>

</html>
