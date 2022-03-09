@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

<h2>Halaman Barang Masuk</h2>

@stop

@section('content')

<div class="row">

<div class="col-sm-1"></div>
<div class="card col-md-10">
  <h2 class="card-header">Barang Masuk
    <a href="{{ route('barang-masuk.index') }}" class="btn btn-default float-right col-sm-2"><span class="fa fa-arrow-left">&nbsp;</span> Kembali</a>
</h2>
  <div class="card-body">
    <div class="col-md-12">
        <form role="form" action="{{ route('barang-masuk.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Kode Barang Masuk</label>
                    <input class="form-control boxed" placeholder="Kode" required="required" name="kode_barang_masuk" type="text" value="{{ $kode }}" id="kode" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Pengajuan</label>
                    <select name="pengajuan_id" class="form-control" required="required">

                            @foreach($pengajuan as $data)
                                @if ($data->status == 1)
                                    <option value="{{$data->id}}">{{$data->kode_pengajuan}}</option>
                                @endif
                            @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk')
                    is-invalid @enderror" placeholder="Tanggal masuk" value="{{ old('tanggal_masuk') }}">
                    @error('tanggal_masuk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                </div>
                <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier_id" class="form-control">

                            @foreach($supplier as $data)
                                <option value="{{$data->id}}">{{$data->nama_supplier}}| {{$data->ket}}</option>
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Barang</label>
                    <select name="barang_id" class="form-control" required="required">

                            @foreach($barang as $data)
                                <option value="{{$data->id}}">{{$data->kode_barang}} | {{$data->nama}}</option>
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
                    <label>Harga Barang</label>
                    <select name="harga" class="form-control" required="required">

                            @foreach($supplier as $data)
                                <option value="{{$data->harga}}"> {{$data->nama_supplier}} | {{$data->ket}} | Rp.{{$data->harga}}</option>
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Estimasi Harga</label>
                    <select name="perkiraan_biaya" class="form-control" required="required">

                            @foreach($pengajuan as $data)
                                @if ($data->status == 1)
                                <option value="{{$data->perkiraan_biaya}}">{{$data->kode_pengajuan}} | Rp.{{$data->perkiraan_biaya}}</option>
                                @endif
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Satuan Barang</label>
                    <select name="satuan_id" class="form-control" required="required">

                            @foreach($satuan as $data)
                                <option value="{{$data->id}}">{{$data->nama_satuan}}</option>
                            @endforeach

                    </select>
                </div>

                <div class="form-group">
                    <label>Penerima</label>
                    <select name="user_id" class="form-control" >

                            @foreach($user as $data)
                                <option value="{{$data->id}}">{{$data->name}}</option>
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
