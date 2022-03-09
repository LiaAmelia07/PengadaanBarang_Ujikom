@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<center><h1>SELAMAT DATANG</h1>
        <h1>DI PENGADAAN BARANG SMK ASSALAAM BANDUNG</h1><br></center>

@endsection

@section('content')
@role('admin')
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ DB::table('suppliers')->count(); }}</h3>

                <p> Data Supplier</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <a href="pengadaanbarang/supplier" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ DB::table('barangs')->count(); }}</h3>

                <p>Barang</p>
              </div>
              <div class="icon">
                <i class="fas fa-archive"></i>
              </div>
              <a href="pengadaanbarang/barang" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ DB::table('barang_masuks')->count(); }}</h3>

                <p>Barang Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-download"></i>
              </div>
              <a href="pengadaanbarang/barang-masuk" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ DB::table('barang_keluars')->count(); }}</h3>

                <p>Barang Keluar</p>
              </div>
              <div class="icon">
                <i class="fas fa-upload"></i>
              </div>
              <a href="pengadaanbarang/barang-keluar" class="small-box-footer">Lihat Data <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        @endrole
        <center><img src="{{asset('img/smk.png')}}" alt="..." /></center>
@endsection

@section('css')

@endsection

 @section('js')

@stop
