<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        }
        a {
            color: #fff;
            text-decoration: none;
        }
        table {
            font-size: x-small;
            border-collapse: collapse;

        }
        td th{
            border: 1px solid #dddddd;
            padding: 8px;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }
        .invoice table {
            margin: 15px;
        }
        .invoice h3 {
            margin-left: 15px;
        }
        .information {
            background-color: #60A7A6;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }

        .border{
            border: 1px solid black;
            
        }
        .left{
            margin-left: 18px;
        }
        .Right{
            margin-right: 18px;
            float: right;
        }
        .text-align{
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="/css/bootstrap.min.css"/>
</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>Admin</h3>
                <pre>
                    Batu aji
                    Batam
                    Indonesia
                </pre>
            </td>
            <td align="center">
                <img src="" alt="Logo" width="64" class="logo"/>
            </td>
            <td align="right" style="width: 40%;"">

                <h3>CompanyName</h3>
                <pre>
                    https://company.com

                    Batam center
                    Batam
                    Indonesia
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>


<div class="invoice">
    <div>
        <h1 align="center">Invoice Bukti Pengeluaran Barang</h1>
        <div class="left">
            
            <p>No Id Transaksi  : {{ $id->id_transaksi }}</p>
            <p>Ditunjukan Untuk :</p>
            <p>Tanggal          :</p>
            <p>Po.Customer      :</p>
           
        </div>
    </div>
    
    <br>

    <table width="100%" border="1px">
      <thead>
          <tr>
            <th style="width:20px" align="center">No</th>
            <th style="width:80px" align="center">Transaction ID</th>
            <th style="width:80px" align="center">Incoming Date</th>
            <th style="width:80px" align="center">Outcoming Date</th>
            <th style="width:80px" align="center">Item Code</th>
            <th style="width:80px" align="center">Item Name</th>
            <th style="width:80px" align="center">Unit</th>
            <th style="width:80px" align="center">Quantity</th>
          </tr>
      </thead>

        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($Invoice as $inv)
            <tr>
                <td align="center">{{ $no }}</td>
                <td align="center">{{ $inv->id_transaksi }}</td>
                <td align="center">{{ $inv->tanggal_masuk }}</td>
                <td align="center">{{ $inv->tanggal_keluar }}</td>
                <td align="center">{{ $inv->kode_barang }}</td>
                <td align="center">{{ $inv->nama_barang }}</td>
                <td align="center">{{ $inv->satuan }}</td>
                <td align="center">{{ $inv->jumlah }}</td>
               
              </tr>
              {{-- <tr>
                <td align="center" colspan="7"><b>Sum</b></td>
                <td align="center">{{ $inv->jumlah }}</td>
              </tr> --}}
              @php $no++;@endphp
            @endforeach
            <tr>
                <td align="center" colspan="7"><b>Total</b></td>
                <td align="center">{{ $id->jml }}</td>
            </tr>
        </tbody>
    </table>
</div>


<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} <link rel="stylesheet" href="https://github.com/rizkymashudi">https://github.com/rizkymashudi - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                Sleeplessjunkie
            </td>
        </tr>

    </table>
</div>
</body>

</html>