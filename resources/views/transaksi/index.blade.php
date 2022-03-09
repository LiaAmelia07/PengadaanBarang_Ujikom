@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Riwayat Transaksi</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-12">
  <h2 class="card-header">Riwayat Transaksi
    <button onclick = "window.print()" class = "btn btn-primary float-right  col-sm-2 mr-3"><span class = "fa fa-print">&nbsp;</span> Print</button>
</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>

                        <th class = "text-center">No</th>
                        <th class = "text-center">Kode Transaksi</th>
                        <th class = "text-center">Jenis Transaksi</th>
                        <th class = "text-center">Nama Barang</th>
                        <th class = "text-center">Tanggal Transaksi</th>
                        <th class = "text-center">Qty</th>
                        <th class = "text-center">Harga</th>
                        <th class = "text-center">Total Biaya</th>
                        <th class = "text-center">perkiraan Biaya</th>
                        <th class = "text-center">Keterangan</th>
                        <th class = "text-center">Penerima / Pengeluar</th>
                        <th class = "text-center">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                 @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($transaksi as $data)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$data->kode}}</td>
                        <td class="text-center">{{$data->jenis}}</td>
                        <td class="text-center">{{$data->barang->nama}}</td>
                        <td class="text-center">{{$data->tanggal_transaksi}}</td>
                        <td class="text-center">{{$data->qty}}</td>
                        <td class="text-center">Rp.{{$data->harga}}</td>
                        <td class="text-center">Rp.{{$data->total_biaya}}</td>
                        <td class="text-center">Rp.{{$data->perkiraan_biaya}}</td>

                        @if ($data->perkiraan_biaya == $data->total_biaya)
                            <td class="text-center">Total Dan Perkiraan Sama Rp.{{$data->total_biaya}}</td>
                        @elseif ($data->total_biaya <= $data->perkiraan_biaya)
                            <td class="text-center">Lebih Rp.{{$data->ket}}</td>
                        @elseif ($data->total_biaya >= $data->perkiraan_biaya)
                            <td class="text-center">Kurang Rp.{{$data->ket}}</td>
                        @endif
                        <td class="text-center">{{$data->user->name}}</td>
                        <td class="text-center">
                            <form class="text-center" action="{{route('transaksi.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <button type="submit" class="btn btn-danger delete-confirm">Delete</button>                                </form>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
  </div>
</div>

</div>

@stop

@section('css')

@stop

 @section('js')
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script>
        $(".delete-confirm").click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@stop
