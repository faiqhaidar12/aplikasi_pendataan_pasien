@extends('layout.v_template')
@section('title','Edit Dokter')
@section('content')

<form action="/dokter/update/{{$dokter->id_dokter}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
        <div class="col-sm-6">

        <div class="form-group">
            <label>NIP</label>
            <input name="nip_dokter" class="form-control " value="{{$dokter->nip_dokter}}" readonly>
            <div class="text-danger">
        @error('nip_dokter')
    {{ $message }}
        @enderror
      </div>
        </div>
    
        
        <div class="form-group">
            <label>Nama Dokter</label>
            <input name="nama_dokter" class="form-control" value="{{$dokter->nama_dokter}}">
            <div class="text-danger">
        @error('nama_dokter')
    {{ $message }}
        @enderror
      </div>
        </div>

        
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" class="form-control" value="{{$dokter->alamat}}">
            <div class="text-danger">
        @error('alamat')
    {{ $message }}
        @enderror
      </div>
        </div>

        <div class="col-sm 12">
            <div class="col-sm-4">
                <img src="{{url('foto_dokter/'.$dokter ->foto_dokter)}}" width="150px">
            </div>
            <div class="col-sm-8">
                <div class="form-group">
            <label>Ganti Foto Dokter</label>
            <input type="file" name="foto_dokter" class="form-control">
            <div class="text-danger">
        @error('foto_dokter')
    {{ $message }}
        @enderror
      </div>
        </div>
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