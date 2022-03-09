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
    <a href="{{ route('user-management.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('user-management.store') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control @error('name')
                    is-invalid @enderror" placeholder="Masukan Nama" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control @error('email')
                    is-invalid @enderror" placeholder="Masukan Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">kata Sandi</label>
                    <input type="password" name="password" class="form-control @error('password')
                    is-invalid @enderror" placeholder="Masukan password" value="{{ old('password') }}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Hak Akses</label>
                    <br>
                    <select name="role[]" class="form-control">
                        @foreach ($roles as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Reset</button>
            </div>
            </form>
        </div>
  </div>

@stop

@section('css')

@stop

 @section('js')

@stop
