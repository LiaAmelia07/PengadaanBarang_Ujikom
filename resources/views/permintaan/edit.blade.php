@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Pengajuan</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Pengajuan Barang
    <a href="{{ route('permintaan.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('permintaan.update', $pengajuan->id) }}" method="post">
            @csrf
            @method('put')
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control @error('tanggal')
                    is-invalid @enderror" placeholder="Tanggal" value="{{ $pengajuan->tanggal }}">
                    @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Kode Pengajuan</label>
                    <input value="{{ $pengajuan->kode_pengajuan }}" class="form-control boxed" placeholder="Kode" required="required" name="kode_pengajuan" type="text" id="kode" readonly>
                </div>

                 <div class="form-group">
                    <label>Nama Barang</label>
                    <select value="{{ $pengajuan->barang_id }}" name="barang_id" class="form-control">
                            @foreach($barang as $data)
                                <option value="{{$data->id}}">{{$data->nama}}</option>
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Qty</label>
                    <input type="number" name="qty" class="form-control @error('qty')
                    is-invalid @enderror" placeholder="Masukan Qty" value="{{ $pengajuan->qty }}">
                    @error('qty')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Perkiraan Biaya</label>
                    <input type="number" name="perkiraan_biaya" class="form-control @error('perkiraan_biaya')
                    is-invalid @enderror" placeholder="Perkiraan Biaya" value="{{ $pengajuan->perkiraan_biaya}}">
                    @error('perkiraan_biaya')
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
