@extends('layout.v_template')
@section('title','Detail Dokter')
@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
<tr>
    <th width="100px">NIP</th>
    <th width="30px">:</th>
    <th> {{$dokter->nip_dokter}}</th>
</tr>
<tr>
    <th width="100px">Nama Dokter</th>
    <th width="30px">:</th>
    <th> {{$dokter->nama_dokter}}</th>
</tr>
<tr>
    <th width="100px">Alamat</th>
    <th width="30px">:</th>
    <th> {{$dokter->alamat}}</th>
</tr>
<tr>
    <th width="100px">Foto</th>
    <th width="30px">:</th>
    <th><img src="{{url('foto_dokter/'.$dokter->foto_dokter) }}" width="400px"></th>
</tr>
<tr>
    <th><a href="/dokter" class="btn btn-success btn-sm">Kembali</a></th>
</tr>
</table>



@endsection