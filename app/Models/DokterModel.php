<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class DokterModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_dokter')->get();
    }

    public function detailData($id_dokter)
    {
        return DB::table('tbl_dokter')->where('id_dokter', $id_dokter)->first();
    }

    public function addData($data)
    {
        DB::table('tbl_dokter')->insert($data);
    }

    public function editData($id_dokter, $data)
    {
        DB::table('tbl_dokter')->where('id_dokter', $id_dokter)->update($data);
    }

    public function deleteData($id_dokter)
    {
        DB::table('tbl_dokter')->where('id_dokter', $id_dokter)->delete();
    }
}