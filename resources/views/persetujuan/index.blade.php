@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Persetujuan</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Persetujuan
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="/pengadaanbarang/persetujuanbarangmasuk" method="post">
            @csrf
                <div class="form-group">
                    <label>Kode Pengajuan</label>
                    <input type="text" name="kode_pengajuan" class="form-control @error('kode_pengajuan')
                    is-invalid @enderror" placeholder="Kode Pengajuan" value="{{ old('kode_pengajuan') }}">
                    @error('kode_pengajuan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
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
