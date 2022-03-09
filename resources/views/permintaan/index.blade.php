@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Pengajuan Barang Masuk</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-12">
  <h2 class="card-header">Pengajuan Barang Masuk<a href="{{ route('permintaan.create') }}" class="btn btn-primary float-right col-sm-2"><span class="fa fa-plus">&nbsp;</span> tambah</a>

</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Kode Pengajuan</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Perkiraan Biaya</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($pengajuan as $data)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$data->tanggal}}</td>
                        <td class="text-center">{{$data->kode_pengajuan}}</td>
                        <td class="text-center">{{$data->barang->nama}}</td>
                        <td class="text-center">{{$data->qty}}</td>
                        <td class="text-center">Rp.{{$data->perkiraan_biaya}}</td>
                        @if ($data->status == 1)
                                <td>
                                    <div class="p-2 mb-2 bg-success text-white">Sudah Disetujui</div>
                                </td>
                                @elseif($data->status ==2)
                            <td>
                                <div class="p-2 mb-2 bg-primary text-white">Sudah Transaksi</div>
                            </td>
                            @else
                                <td>
                                    <div class="p-3 mb-2 bg-danger text-white">Menunggu Persetujuan</div>
                                </td>
                            @endif
                        <td class="text-center">
                            <form class="text-center" action="{{route('permintaan.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <a href="{{route('permintaan.edit',$data->id)}}" class="btn btn-warning">Edit</a>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus')">Delete</button>
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
