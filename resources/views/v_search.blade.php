@extends('layout.v_template')
@section('title','Pasien')
@section('content')



<a href="/pasien/add" class="btn btn-primary btn-sm">Tambah</a>
<a href="/pasien/print" target="_blank" class="btn btn-success btn-sm">Print to Printer</a>
<a href="/pasien/printpdf" target="_blank" class="btn btn-danger btn-sm">Print to PDF</a><br>
@if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{session('pesan')}}.
              </div>
@endif

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">

        
        <div class="box-tools">
          <form action="{{ route('search') }}" method="GET">
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
            <input type="search" name="query" class="form-control" placeholder="Search" value="{{ request()->input('query') }}">
            <div class="input-group-btn">
              <button  type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </form>
      </div>
    
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
                
    <thead>
    <tr>
      
      <th>No</th>
      <th>No Bpjs</th>
      <th>Nama Pasien</th>
      <th>Alamat</th>
      <th>Status</th>
      <th>Golongan</th>
      <th>Aksi</th>

    </tr>
    </thead>

    <tbody>
        <?php $no=1; ?>
        @foreach ($pasien as $data)
            <tr>
                <th>{{$no++}}</th>
                <th>{{$data->no_bpjs}}</th>
                <th>{{$data->nama_pasien}}</th>
                <th>{{$data->alamat}}</th>
                <th>{{$data->id_status}}</th>
                <th>{{$data->id_golongan}}</th>
                <td>
                    <a href="/pasien/edit/{{$data->id_pasien}}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_pasien}}">
                      Delete
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@foreach ($pasien as $data)
<div class="modal modal-danger fade" id="delete{{$data->id_pasien}}">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{$data->nama_pasien}}</h4>
        </div>
        <div class="modal-body">
          <p>Apakah Anda Yakin Akan Menghapus Data Ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
          <a href="/pasien/delete/{{$data->id_pasien}}" class="btn btn-outline">Yes</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
    
  @endforeach

@endsection