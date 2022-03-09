@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Cetak Laporan</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Cetak Laporan</h2>
  <div class="card-body">
    <div class="col-md-12">
    @if (session()->has('gagal'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('gagal') }}
        </div>
    @endif
        <form role="form" action="/pengadaanbarang/cetak-laporan" method="post">
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cetak" id="cetak1" value="barang" checked>
                <label class="form-check-label" for="cetak1">
                  <h4> Barang</h4>
                </label>
              </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cetak" id="cetak2" value="masuk" checked>
                <label class="form-check-label" for="cetak2">
                  <h4> Barang Masuk</h4>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="cetak" id="cetak3" value="keluar">
                <label class="form-check-label" for="cetak3">
                  <h4> Barang Keluar</h4>
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="cetak" id="cetak4" value="transaksi">
                <label class="form-check-label" for="cetak4">
                  <h4> Transaksi</h4>
                </label>
              </div><br>
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" class="form-control @error('tanggal_awal')
                    is-invalid @enderror" placeholder="Tanggal Awal" value="{{ old('tanggal_awal') }}">
                    @error('tanggal_awal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" class="form-control @error('tanggal_akhir')
                    is-invalid @enderror" placeholder="Tanggal Akhir" value="{{ old('tanggal_akhir') }}">
                    @error('tanggal_akhir')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Cetak Laporan</button>
                </div>
            </form>
        </div>
  </div>

@stop

@section('css')

@stop

 @section('js')

@stop
