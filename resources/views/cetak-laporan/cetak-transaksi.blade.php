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
    <h2>Laporan Transaksi</h2>
        {{-- <a href="/pengadaanbarang/cetak-bm" class="btn btn-primary float-right col-sm-2"><span class="fa fa-file-pdf-o">&nbsp;</span> Cetak Laporan ke PDF</a> --}}
    <br><br>

    <table border="1">
         <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Transaksi</th>
                        <th>Jenis Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Transaksi</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Total Biaya</th>
                        <th>Keterangan</th>
                        <th>Penerima / Pengeluar</th>
                    </tr>
                </thead>
        <tbody>
            @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($transaksi as $data)
                    <tr>
                        <td><center>{{$no++}}</center></td>
                        <td>{{$data->kode}}</td>
                        <td>{{$data->jenis}}</td>
                        <td>{{$data->barang->nama}}</td>
                        <td>{{$data->tanggal_transaksi}}</td>
                        <td><center>{{$data->qty}}</center></td>
                        <td>Rp. {{$data->harga}}</td>
                        <td>Rp. {{$data->total_biaya}}</td>
                         @if ($data->perkiraan_biaya == $data->total_biaya)
                            <td class="text-center">Total Dan Perkiraan Sama Rp.{{$data->total_biaya}}</td>
                        @elseif ($data->total_biaya <= $data->perkiraan_biaya)
                            <td class="text-center">Lebih Rp.{{$data->ket}}</td>
                        @elseif ($data->total_biaya >= $data->perkiraan_biaya)
                            <td class="text-center">Kurang Rp.{{$data->ket}}</td>
                        @endif
                        <td>{{$data->user->name}}</td>
                    </tr>
                    @endforeach
        </tbody>
    </table>
    </center>
</body>
</html>
