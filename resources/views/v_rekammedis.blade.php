@extends('layout.v_template')
@section('title','RekamMedis')
@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        
        <div class="col-md-4">
            <div class="box box-success">
                <div class="box-body">
                    <div class="col-md-12">
                        <form class="form-horizontal form-disable-enter" id="cariPeserta">
    <div id="panelTanggalCari" class="form-group" style="margin-bottom:5px;">
        <label class="col-md-4 control-label">Tanggal</label>
        <div class="col-md-8">
            <div class="input-group date" style="padding-left:0px;">
                <input type='text' class="form-control datepicker" id="txttanggal" placeholder="yyyy-MM-dd" maxlength="10" />
                <span class="input-group-addon">
                    <span class="fa fa-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>
    <div class="form-group" style="margin-bottom:5px;">
        <label class="col-sm-4 control-label" id="lblNoPencarian">No. Pencarian</label>
        <div class="col-sm-8">
            <div class="input-group" style="padding-left:0px;">
                
                <input type="text" class="form-control" placeholder="Nomor" id="txtnokartu" >
                <span class="input-group-btn">
                    <button type="button" id="btnCariPeserta" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                   
                </span>
            </div>
        </div>
    </div>
    <div id="panelPelayanan" class="callout callout-success box" style="display:none; margin-top:20px;">
        <label id="lblnamajenispelayanan"></label>
        <label id="lblnamapelayanan"></label>
    </div>
    <div class="form-group" style="margin-bottom:3px;">
        <label class="col-md-4 control-label">No. Kartu BPJS</label>
        <div class="col-sm-8">
            <label class="control-label" id="lblnokartu" name="Aktivitas"></label>
            <label id="prb_lbl" class="control-label" style="color:red;"></label>
        </div>
    </div>
    <div class="form-group" style="margin-bottom:3px;">
        <label class="col-sm-4 control-label">Nama</label>
        <div class="col-sm-8">
            <label class="control-label" id="lblnmpst" name="Aktivitas"></label>
            <label id="asuransi_lbl" class="control-label" style="color:red;"></label>
        </div>
    </div>
    <div class="form-group" style="margin-bottom:3px;">
        <label class="col-sm-4 control-label">Status Peserta</label>
        <div class="col-sm-8">
            <label class="control-label" id="lblstatpst" name="Aktivitas"></label>
        </div>
    </div>
    <div class="form-group" style="margin-bottom:3px;">
        <label class="col-sm-4 control-label">Golongan</label>
        <div class="col-sm-8">
            <label class="control-label" id="lbljnspst" name="Aktivitas"></label>
        </div>
    </div>
    <div style="padding-top:10px; text-align:center" id="infoTunggakan_lyt">
        <label id="infoTunggakan_lbl" style="color:red; font-style:italic;font-weight:bold"></label>
    </div>
            
        
    
</form>
                        <div class="callout callout-success" id="lblInfoSkrining" style="text-align:center"></div>
                    </div>
                </div>
            </div>
            <div class="box box-warning" style="margin-bottom:0px;">
                <div class="box-body">
                    <form class="form-horizontal form-disable-enter" id="insertPendaftaran" method="post">
                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-4 control-label">Jenis Kunjungan</label>
                            <div class="col-sm-8">
                                <label class="radio-inline" style="margin-left:0px;margin-right:10px;"><input type="radio" name="kunjSakitF" checked="checked" value="true">Kunjungan Sakit</label>
                                        <label class="radio-inline" style="margin-left:0px;margin-right:10px;"><input type="radio" name="kunjSakitF" value="false">Kunjungan Sehat</label>



                                </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-4 control-label">Perawatan</label>
                            <div class="col-sm-8">
                                        <label class="radio-inline" style="margin-left:0px;margin-right:10px;"><input type="radio" name="tkp" id="tkp10" checked="checked" value="10">Rawat Jalan</label>
                                        <label class="radio-inline" style="margin-left:0px;margin-right:10px;"><input type="radio" name="tkp" id="tkp20" value="20">Rawat Inap</label>
                                        <label class="radio-inline" style="margin-left:0px;margin-right:10px;"><input type="radio" name="tkp" id="tkp50" value="50">Promotif Preventif</label>

                            </div>
                        </div>
                        
                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-4 control-label">Keluhan</label>
                            <div class="col-sm-8">
                                <textarea rows="2" maxlength="5000" class="form-control" id="keluhan" name="keluhan"></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-4 control-label">Terapi Obat</label>
                            <div class="col-sm-8">
                                <textarea rows="2" maxlength="5000" class="form-control" id="terapiobat" name="terapiobat"></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-4 control-label">Terapi Non Obat</label>
                            <div class="col-sm-8">
                                <textarea rows="2" maxlength="5000" class="form-control" id="terapinonobat" name="terapinonobat"></textarea>
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-4 control-label">Diagnosa</label>
                            <div class="col-sm-8">
                                <textarea rows="2" maxlength="5000" class="form-control" id="diagnosa" name="diagnosa"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Suhu</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="suhu_txt" name="suhu_txt" maxlength="5">
                                    <span class="input-group-addon"><b>℃</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Riwayat Alergi</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" id="alergiMakan_chk" >Makanan
                                    </span>
                                    <select class="form-control" id="alergiMakan_slc" name="alergiMakan_slc">
                                        <option></option>
                                        <option value="00">Tidak Ada</option>
                                        <option value="01">Seafood</option>
                                        <option value="02">Gandum</option>
                                        <option value="03">Susu Sapi</option>
                                        <option value="04">Kacang-Kacangan</option>
                                        <option value="05">Makanan Lain</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" id="alergiUdara_chk" >Udara
                                    </span>
                                    <select class="form-control" id="alergiUdara_slc" name="alergiUdara_slc">
                                        <option></option>
                                        <option value="00">Tidak Ada</option>
                                        <option value="01">Udara Panas</option>
                                        <option value="02">Udara Dingin</option>
                                        <option value="03">Udara Kotor</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <input type="checkbox" id="alergiObat_chk" >Obat-Obatan
                                    </span>
                                    <select class="form-control" id="alergiObat_slc" name="alergiObat_slc">
                                        <option></option>
                                        <option value="00">Tidak Ada</option>
                                        <option value="01">Antibiotik</option>
                                        <option value="02">Antiinflamasi</option>
                                        <option value="03">Non Steroid</option>
                                        <option value="04">Aspirin</option>
                                        <option value="05">Kortikosteroid</option>
                                        <option value="06">Insulin</option>
                                        <option value="07">Obat-Obatan Lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-12 h4 pull-left"><b>Pemeriksaan Fisik</b></label>
                        </div>
                        <div class=" col-sm-12" style="margin-top:-10px;margin-left:-10px;padding-right:0px;">
                            <div class="col-sm-6" style="max-width:200px;">
                                <label class="control-label">Tinggi Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="tinggiBadan" name="tinggiBadan" maxlength="3">
                                    <span class="input-group-addon"><b>cm</b></span>
                                </div>
                            </div>
                            <div class="col-sm-6" style="max-width:200px;">
                                <label class="control-label">Berat Badan</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="beratBadan" name="beratBadan" maxlength="3">
                                    <span class="input-group-addon"><b>kg&nbsp;</b></span>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-12" style="margin-top:10px;margin-left:-10px;padding-right:0px;">
                            <div class="col-sm-6" style="max-width:200px;">
                                <label class="control-label">Lingkar Perut</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="lingkarPerut" name="lingkarPerut" maxlength="3">
                                    <span class="input-group-addon"><b>cm</b></span>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group" style="margin-bottom:5px;">
                            <label class="col-sm-5 h4 pull-left"><b>Tekanan Darah</b></label>
                        </div>
                        <div class="col-sm-12" style="margin-top:-10px;margin-left:-10px;padding-right:0px;">
                            <div class="col-sm-6" style="max-width:200px;">
                                <label class="control-label">Sistole</label>
                                <div class=" input-group">
                                    <input type="text" class="form-control" id="sistole" name="sistole" maxlength="3">
                                    <span class="input-group-addon"><b>mmHg</b></span>
                                </div>
                            </div>
                            <div class="col-sm-6" style="max-width:200px;">
                                <label class=" control-label">Diastole</label>
                                <div class=" input-group">
                                    <input type="text" class="form-control" id="diastole" name="diastole" maxlength="3">
                                    <span class="input-group-addon"><b>mmHg</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top:10px;margin-left:-10px;padding-right:0px;">
                            <div class="col-sm-6" style="max-width:200px;">
                                <label class="control-label">Respiratory Rate</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="respRate" name="respRate" maxlength="3">
                                    <span class="input-group-addon"><b>/ minute</b></span>
                                </div>
                            </div>
                            <div class="col-sm-6" style="max-width:200px;">
                                <label class="control-label">Heart Rate</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="heartRate" name="heartRate" maxlength="3">
                                    <span class="input-group-addon"><b>bpm</b></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top:15px;">
                            <input type="button" class="btn btn-success" id="btnSimpanPendaftaran" name="Aktivitas"  value="Simpan">
                            <input type="button" class="btn btn-default" id="Aktivitas" value="Batal">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8" style="margin-left:-14px;">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Riwayat Pendaftaran Peserta</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <form class="form-horizontal">
                            <div class="form-group">
                                
                                <label class="col-sm-2 control-label">Tanggal Pendaftaran</label>
                                <div class="col-sm-2">
                                    <div class='input-group date'>
                                        <input type='text' class="form-control datepicker" id="bulanRiwayat" placeholder="yyyy-MM-dd" maxlength="10" />
                                        <span class="input-group-addon">
                                            <span class="fa fa-calendar">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <label class="col-sm-2 control-label">Jenis Kunjungan</label>
                                <div class="col-sm-2">
                                    <div class='input-group'>
                                        <select class="form-control" id="kunjSakitRiwayat" name="kunjSakitRiwayat">
                                            <option selected="selected" value="0,1">Semua</option>
                                            <option value="1">Kunjungan Sakit</option>
                                            <option value="0">Kunjungan Sehat</option>
                                        </select>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" id="cariRiwayat" value="Cari">Refresh</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <table id="example" class="table  table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. KARTU</th>
                                                <th>NAMA PESERTA</th>
                                                <th>KELAMIN</th>
                                                <th>USIA</th>
                                                <th>POLI/KEGIATAN</th>
                                                <th>STATUS</th>
                                                <th>HAPUS</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->


@endsection