@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang Keluar</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Barang Keluar
    <a href="{{ route('barang-keluar.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('barang-keluar.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>ID Transaksi Barang Keluar</label>
                    <input class="form-control boxed" placeholder="Kode" required="required" name="kode_barang_keluar" type="text" value="{{ $kode }}" id="kode" readonly>
                </div>

                <div class="form-group">
                    <label>Tanggal Keluar</label>
                    <input type="date" name="tanggal_keluar" class="form-control @error('tanggal_keluar')
                    is-invalid @enderror" placeholder="Tanggal Keluar" value="{{ old('tanggal_keluar') }}">
                    @error('tanggal_keluar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" class="form-control">

                            @foreach($barang as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Qty</label>
                    <input type="number" name="qty" class="form-control @error('qty')
                    is-invalid @enderror" placeholder="Masukan Qty" value="{{ old('qty') }}">
                    @error('qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Pengeluar</label>
                    <select name="user_id" class="form-control">

                            @foreach($user as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Keterangan</label>
                    <input type="text" name="ket" class="form-control @error('ket')
                    is-invalid @enderror" placeholder="Keterangan" value="{{ old('ket') }}">
                    @error('ket')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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
