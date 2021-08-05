@extends('layout.v_template')
@section('title','Dokter')

@section('content')
<a href="/dokter/add" class="btn btn-primary btn-sm">Tambah</a><br>
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
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama Dokter</th>
                  <th>Alamat</th>
                  <th>Foto Dokter</th>
                  <th>Action</th>
                </tr>
                <tbody>
        <?php $no=1; ?>
        @foreach ($dokter as $data)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $data->nip_dokter }}</td>
                <td>{{ $data->nama_dokter }}</td>
                <td>{{ $data->alamat }}</td>
                <td><img src="{{url('foto_dokter/'.$data ->foto_dokter)}}" width="100px"></td>
                <td>
                    <a href="/dokter/detail/{{$data->id_dokter}}" class="btn btn-success">Detail</a>
                    <a href="/dokter/edit/{{$data->id_dokter}}" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$data->id_dokter}}">
                      Delete
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
              </table>
              @foreach ($dokter as $data)
                  
              

            </div>
            <div class="modal modal-danger fade" id="delete{{$data->id_dokter}}">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">{{$data->nama_dokter}}</h4>
                  </div>
                  <div class="modal-body">
                    <p>Apakah Anda Yakin Akan Menghapus Data Ini?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                    <a href="/dokter/delete/{{$data->id_dokter}}" class="btn btn-outline">Yes</a>
                  </div>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            @endforeach
            <!-- /.content-wrapper -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  
@endsection