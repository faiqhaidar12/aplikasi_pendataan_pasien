@extends('layout.v_template')
@section('title','Add Pasien')
@section('content')

<form action="/pasien/insert" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="content">
        <div class="row">
        <div class="col-sm-6">

            <div class="callout callout-warning">
                <h4>Isi Status Dan Golongan Dengan Angka</h4>

                <h3>Status</h3>
                    <h4>1 Aktif | 2 Tidak Aktif</h4>
                    <br>
                <h3>Golongan</h3>
                    <h4>1 Bekerja | 2 Sekolah</h4>
                
              </div>

        <div class="form-group">
            <label>No Bpjs</label>
            <input name="no_bpjs" class="form-control " value="{{old('no_bpjs')}}">
            <div class="text-danger">
        @error('no_bpjs')
    {{ $message }}
        @enderror
      </div>
        </div>
    
        
        <div class="form-group">
            <label>Nama Pasien</label>
            <input name="nama_pasien" class="form-control" value="{{old('nama_pasien')}}">
            <div class="text-danger">
        @error('nama_pasien')
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

        <div class="input-group">
            <label>Status</label>
            <input type="number" min="1" max="2" name="id_status" class="form-control" value="{{old('id_status')}}">
            <div class="text-danger">
        @error('id_status')
    {{ $message }}
        @enderror
      </div>
        </div>

        <div  class="input-group">
            <label>Golongan</label>
            <input  type="number" min="1" max="2" name="id_golongan" class="form-control" value="{{old('id_golongan')}}">
            <div class="text-danger">
        @error('id_golongan')
    {{ $message }}
        @enderror
      </div>
        </div>
        
<br>
        <div class="form-group">
            <button class="btn btn-primary btn-sm">Simpan</button>
        </div>
        
    </div>
    </div>
    </div>
    

</form>

@endsection