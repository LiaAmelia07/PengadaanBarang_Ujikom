@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman User Management</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">User Management
    <a href="{{ route('user-management.create') }}" class="btn btn-primary float-right col-sm-2"><span class="fa fa-plus">&nbsp;</span> Tambah</a>
</h2>
@if (session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('sukses') }}
        </div>
@elseif (session()->has('edit'))
<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
    {{ session('edit') }}
</div>
@endif
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                @php $no=1 @endphp
                @foreach ($user as $data)
                <tr>
                    <td class="text-center">{{$no++}}</td>
                    <td class="">{{$data->name}}</td>
                    <td class="">{{$data->email}}</td>

                    @foreach ($data->roles as $role)
                        <td>{{$role->name}}</td>
                    @endforeach
                    <td>
                        <form class="text-center" action="{{route('user-management.destroy',$data->id)}}" method="post">
                            @method('delete')
                            @csrf
                                <a href="{{route('user-management.edit',$data->id)}}" class="btn btn-warning"><span class="fa fa-edit"></span></a>

                                <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
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
