@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman User Management</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Edit User
    <a href="{{ route('user-management.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('user-management.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control @error('name')
                    is-invalid @enderror" placeholder="Masukan Nama" value="{{ $user->name }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control @error('email')
                    is-invalid @enderror" placeholder="Masukan Email" value="{{$user->email }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
            </div>

            <div class="form-group">
                <label>Kata Sandi</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="">Hak Akses</label>
                <select name="role[]" class="form-control">
                    @foreach ($roles as $data)
                        <option value="{{ $data->id }}" @isset($user)
                            @if (in_array($data->id, $user->roles->pluck('id')->toArray())) selected @endif @endisset>
                            {{ $data->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <button class="btn btn-default" type="reset">Batal</button>
            </div>
            </form>
        </div>
  </div>

@stop

@section('css')

@stop

 @section('js')

@stop
