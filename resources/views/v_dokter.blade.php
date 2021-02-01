@extends('layout.v_template')
@section('title','Dokter')

@section('content')

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
                    <a href="" class="btn btn-warning">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection