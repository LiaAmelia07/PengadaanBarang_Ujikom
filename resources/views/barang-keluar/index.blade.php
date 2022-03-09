@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang Keluar</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-12">
@if (session()->has('gagal'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        {{ session('gagal') }}
    </div>
@endif
 <h2 class="card-header">Barang Keluar
      <a href="{{ route('barang-keluar.create') }}" class="btn btn-primary float-right col-sm-2 ml-3"><span class="fa fa-plus">&nbsp;</span> tambah</a>
      <button onclick = "window.print()" class = "btn btn-primary float-right  col-sm-2 ml-3"><span class = "fa fa-print">&nbsp;</span> Print</button>
</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang Keluar</th>
                        <th>Tanggal Keluar</th>
                        <th>Nama Barang</th>
                        <th>Qty</th>
                        <th>Pengeluar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                 @php $no=1 @endphp
                    <!-- data -->
                    @foreach ($keluar as $data)
                    <tr>
                        <td class="text-center">{{$no++}}</td>
                        <td class="text-center">{{$data->kode_barang_keluar}}</td>
                        <td class="text-center">{{$data->tanggal_keluar}}</td>
                        <td class="text-center">{{$data->barang->nama}}</td>
                        <td class="text-center">{{$data->qty}}</td>
                        <td class="text-center">{{$data->user->name}}</td>
                        <td class="text-center">{{$data->ket}}</td>
                        <td class="text-center">
                            <form class="text-center" action="{{route('barang-keluar.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <a href="{{route('barang-keluar.edit',$data->id)}}" class="btn btn-warning">Edit</a>
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
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}"
@stop

@section('js')
<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('#barang-keluar').DataTable();
    });
    </script>
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
