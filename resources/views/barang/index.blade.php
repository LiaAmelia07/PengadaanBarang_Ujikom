@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-12">
  <h2 class="card-header">Data Barang
      @role('admin|superadmin')
      <a href="{{ route('barang.create') }}" class="btn btn-primary float-right col-sm-2 ml-3"><span class="fa fa-plus">&nbsp;</span> tambah</a>
      @endrole
      <button onclick = "window.print()" class = "btn btn-primary float-right col-sm-2 ml-3"><span class = "fa fa-print">&nbsp;</span> Print</button>
</h2>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Stok</th>
                        <th>Satuan Barang</th>
                        {{-- <th>Tanggal</th> --}}
                        <th>Ket</th>
                        @role('admin|superadmin')
                        <th>Aksi</th>
                        @endrole
                    </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
                    @foreach ($barang as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->kode_barang}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->kategori->kategori}}</td>
                            <td>{{$data->qty}}</td>
                            <td>{{$data->satuan->nama_satuan}}</td>
                            {{-- <td>{{$data->tanggal}}</td> --}}
                            <td>{{$data->ket}}</td>
                            @role('admin|superadmin')
                            <td>
                                <form class="text-center" action="{{route('barang.destroy',$data->id)}}" method="post">
                                @method('delete')
                                @csrf
                                    <a href="{{route('barang.edit',$data->id)}}" class="btn btn-warning">Edit</a>
                                    <button type="submit" class="btn btn-danger delete-confirm">Delete</button>                                </form>
                            </td>
                            @endrole
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
