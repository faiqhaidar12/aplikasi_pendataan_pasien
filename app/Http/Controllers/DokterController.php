<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->DokterModel = new DokterModel();
    }
    public function index()
    {
        $data = [
            'dokter' => $this->DokterModel->allData(),
        ];
        return view('v_dokter', $data);
    }

    public function detail($id_dokter)
    {
        if (!$this->DokterModel->detailData($id_dokter)) {
            abort(404);
        }
        $data = [
            'dokter' => $this->DokterModel->detailData($id_dokter),
        ];
        return view('v_detaildokter', $data);
    }
}
