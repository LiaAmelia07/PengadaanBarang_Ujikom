<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 5px;
        }
        th {
            padding: 5px;
            background: whitesmoke;
        }
    </style>

    <center><br>
    <h2>Laporan Barang Keluar</h2>
        {{-- <a href="/pengadaanbarang/cetak-bm" class="btn btn-primary float-right col-sm-2"><span class="fa fa-file-pdf-o">&nbsp;</span> Cetak Laporan ke PDF</a> --}}
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang Keluar</th>
                <th>Tanggal Keluar</th>
                <th>Nama Barang</th>
                <th>Qty</th>
                <th>Pengeluar</th>
                <th>Keterangan</th>
             </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($bk as $data)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td>{{$data->kode_barang_keluar}}</td>
                        <td>{{$data->tanggal_keluar}}</td>
                        <td>{{$data->barang->nama}}</td>
                        <td><center>{{$data->qty}}</center></td>
                        <td>{{$data->user->name}}</td>
                        <td>{{$data->ket}}</td>
                    </tr>
                    @endforeach
        </tbody>
    </table>
    </center>
</body>
</html>
