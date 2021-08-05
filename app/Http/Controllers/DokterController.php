<?php

namespace App\Http\Controllers;

use App\Models\DokterModel;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->DokterModel = new DokterModel();
        $this->middleware('auth');
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

    public function add()
    {
        return view('v_adddokter');
    }

    public function insert()
    {
        
       request()->validate([
        'nip_dokter' => 'required|unique:tbl_dokter,nip_dokter|min:4|max:5',
        'nama_dokter' => 'required',
        'alamat' => 'required',
        'foto_dokter' => 'required|mimes:jpeg,jpg,bmp,png|max:1024',
        
       ],[
           'nip_dokter.required' => 'Wajib diisi !!',
           'nip_dokter.unique' => 'Nip Sudah Ada !!',
           'nip_dokter.min' => 'Min 4 Karakter',
           'nip_dokter.max' => 'max 5 Karakter',
           'nama_dokter.required' => 'Wajib diisi !!',
           'alamat.required' => 'Wajib diisi !!',
           'foto_dokter.required' => 'Wajib diisi !!',
       ]);
       //jika validasi tidak ada maka lakukan simpan data
       //upload gambar/foto
       $file = Request()->foto_dokter;
       $fileName = Request()->nip_dokter. '.' . $file->extension();
       $file->move(public_path('foto_dokter'), $fileName);
       
       $data = [
           'nip_dokter' => Request()->nip_dokter,
           'nama_dokter' => Request()->nama_dokter,
           'alamat' => Request()->alamat,
           'foto_dokter' => $fileName,
       ];

       $this->DokterModel->addData($data);
       return redirect()->route('dokter')->with('pesan','Data Berhasil Di Tambahkan !!!');
    }

    public function update($id_dokter)
    {
        
       request()->validate([
        'nip_dokter' => 'required|min:4|max:5',
        'nama_dokter' => 'required',
        'alamat' => 'required',
        'foto_dokter' => 'mimes:jpeg,jpg,bmp,png|max:1024',
        
       ],[
           'nip_dokter.required' => 'Wajib diisi !!',
           'nip_dokter.unique' => 'Nip Sudah Ada !!',
           'nip_dokter.min' => 'Min 4 Karakter',
           'nip_dokter.max' => 'max 5 Karakter',
           'nama_dokter.required' => 'Wajib diisi !!',
           'alamat.required' => 'Wajib diisi !!',
       ]);
       //jika validasi tidak ada maka lakukan simpan data
       if (Request()->foto_dokter <> "")
       {
           //jika ingin ganti foto
           //upload gambar/foto
       $file = Request()->foto_dokter;
       $fileName = Request()->nip_dokter. '.' . $file->extension();
       $file->move(public_path('foto_dokter'), $fileName);
       
       $data = [
           'nip_dokter' => Request()->nip_dokter,
           'nama_dokter' => Request()->nama_dokter,
           'alamat' => Request()->alamat,
           'foto_dokter' => $fileName,
       ];
       $this->DokterModel->editData($id_dokter, $data);
       }else{
           //jika tidak ingin ganti foto
           $data = [
           'nip_dokter' => Request()->nip_dokter,
           'nama_dokter' => Request()->nama_dokter,
           'alamat' => Request()->alamat,
       ];
       $this->DokterModel->editData($id_dokter, $data);
       }
       
       return redirect()->route('dokter')->with('pesan','Data Berhasil Di Update !!!');
    }

    public function edit($id_dokter)
    {
        if (!$this->DokterModel->detailData($id_dokter)) {
            abort(404);
        }
        $data = [
            'dokter' => $this->DokterModel->detailData($id_dokter),
        ];
        return view('v_editdokter',$data);
    }

    public function delete($id_dokter)
    {
        //hapus foto
       $dokter = $this->DokterModel->detailData($id_dokter);
       if ($dokter->foto_dokter<> "") {
           unlink(public_path('foto_dokter').'/'. $dokter->foto_dokter);
       }
        $this->DokterModel->deleteData($id_dokter);
        return redirect()->route('dokter')->with('pesan','Data Berhasil Di Hapus !!!');
    }
}