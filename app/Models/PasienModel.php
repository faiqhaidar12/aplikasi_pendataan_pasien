<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PasienModel extends Model
{
    public function allData()
    {
        return DB::table('tbl_pasien')
            ->leftJoin('tbl_status', 'tbl_status.id_status', '=', 'tbl_pasien.id_status')
            ->leftJoin('tbl_golongan', 'tbl_golongan.id_golongan', '=', 'tbl_pasien.id_golongan')
            ->get();
    }


    public function detailData($id_pasien)
    {
        return DB::table('tbl_pasien')->where('id_pasien', $id_pasien)->first();
    }

    public function addData($data)
    {

        DB::table('tbl_pasien')->insert($data);
    }

    public function editData($id_pasien, $data)
    {
        DB::table('tbl_pasien')->where('id_pasien', $id_pasien)->update($data);
    }

    public function deleteData($id_pasien)
    {
        DB::table('tbl_pasien')->where('id_pasien', $id_pasien)->delete();
    }
}
