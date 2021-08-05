@extends('layout.v_template')
@section('title','Add Dokter')
@section('content')

<form action="/dokter/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
        <div class="col-sm-6">

        <div class="form-group">
            <label>NIP</label>
            <input name="nip_dokter" class="form-control " value="{{old('nip_dokter')}}">
            <div class="text-danger">
        @error('nip_dokter')
    {{ $message }}
        @enderror
      </div>
        </div>
    
        
        <div class="form-group">
            <label>Nama Dokter</label>
            <input name="nama_dokter" class="form-control" value="{{old('nama_dokter')}}">
            <div class="text-danger">
        @error('nama_dokter')
    {{ $message }}
        @enderror
      </div>
        </div>

        
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" class="form-control" value="{{old('alamat')}}">
            <div class="text-danger">
        @error('alamat')
    {{ $message }}
        @enderror
      </div>
        </div>

        <div class="form-group">
            <label>Foto Dokter</label>
            <input type="file" name="foto_dokter" class="form-control">
            <div class="text-danger">
        @error('foto_dokter')
    {{ $message }}
        @enderror
      </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary btn-sm">Simpan</button>
        </div>
        
    </div>
    </div>
    </div>
    

</form>

@endsection