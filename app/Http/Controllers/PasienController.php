<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\PasienModel;
use Dompdf\Dompdf;


class PasienController extends Controller
{
    public function __construct()
    {
        $this->PasienModel = new PasienModel();
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'pasien' => $this->PasienModel->allData(),
        ];
        return view('v_pasien', $data);
    }

    public function add()
    {
        $data = [
            'pasien' => $this->PasienModel->allData(),
        ];
        return view('v_addpasien',$data);
    }

    public function insert()
    {
        
       request()->validate([
        'no_bpjs' => 'required|unique:tbl_pasien,no_bpjs|min:8|max:13',
        'nama_pasien' => 'required',
        'alamat' => 'required',
        'id_status' => 'required',
        'id_golongan' => 'required',
        
        
       ],[
           'no_bpjs.required' => 'Wajib diisi !!',
           'no_bpjs.unique' => 'Nip Sudah Ada !!',
           'no_bpjs.min' => 'Min 13 Karakter',
           'no_bpjs.max' => 'max 5 Karakter',
           'nama_pasien.required' => 'Wajib diisi !!',
           'alamat.required' => 'Wajib diisi !!',
           'id_status.required' => 'Wajib diisi !!',
           'id_golongan.required' => 'Wajib diisi !!',
           ]);

           $data = [
            'no_bpjs' => Request()->no_bpjs,
            'nama_pasien' => Request()->nama_pasien,
            'alamat' => Request()->alamat,
            'id_status' => Request()->id_status,
            'id_golongan' => Request()->id_golongan,
        ];

           $this->PasienModel->addData($data);
       return redirect()->route('pasien')->with('pesan','Data Berhasil Di Tambahkan !!');
       }

       public function edit($id_pasien)
    {
        if (!$this->PasienModel->detailData($id_pasien)) {
            abort(404);
        }
        $data = [
            'pasien' => $this->PasienModel->detailData($id_pasien),
        ];
        return view('v_editpasien',$data);
    }

    public function delete($id_pasien)
    {
       
        $this->PasienModel->deleteData($id_pasien);
        return redirect()->route('pasien')->with('pesan','Data Berhasil Di Hapus !!');
    }

    public function update($id_pasien)
    {
        
       request()->validate([
        'no_bpjs' => 'required|min:8|max:13',
        'nama_pasien' => 'required',
        'alamat' => 'required',
        'id_status' => 'required',
        'id_golongan' => 'required',
       

       ],[
           'no_bpjs.required' => 'Wajib diisi !!',
           'no_bpjs.unique' => 'No Bpjs Sudah Ada !!',
           'nip_dokter.max' => 'max 13 Karakter',
           'nama_pasien.required' => 'Wajib diisi !!',
           'id_status.required' => 'Wajib diisi !!',
           'id_golongan.required' => 'Wajib diisi !!',

       ]);
       $data = [
        'no_bpjs' => Request()->no_bpjs,
        'nama_pasien' => Request()->nama_pasien,
        'alamat' => Request()->alamat,
        'id_status' => Request()->id_status,
        'id_golongan' => Request()->id_golongan,

    ];

       $this->PasienModel->editData($id_pasien,$data);
   return redirect()->route('pasien')->with('pesan','Data Berhasil Di Update !!');
   }

   public function print()
   {
    $data = [
        'pasien' => $this->PasienModel->allData(),
    ];
    return view('v_print', $data);
   }
       
   public function printpdf()
   {
    $data = [
        'pasien' => $this->PasienModel->allData(),
    ];
    $html = view('v_printpdf', $data);

    // instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
   }


   

       
    // if( isset($_GET['query']) && strlen($_GET['query']) > 1){

        
    //     $search_text = $_GET['query'];
    //     $data = DB::table('tbl_pasien')->where('nama_pasien','LIKE','%'.$search_text.'%')->paginate(2);
    //     $data->appends($request->all());
    //     return view('v_pasien',['pasien'=>$data]);
        
    // }else{
    //      return view('v_pasien');
    // }
    // return view('v_pasien');
   

function search(Request $request){
    $request->validate([
      'query'=>'required|min:1'
   ]);
   $data = [
    'pasien' => $this->PasienModel->allData(),
];
   $search_text = $request->input('query');
   $data = DB::table('tbl_pasien')
              ->where('nama_pasien','LIKE','%'.$search_text.'%')
            //   ->orWhere('SurfaceArea','<', 10)
            //   ->orWhere('LocalName','like','%'.$search_text.'%')
            
              ->paginate(2);
             
    return view('v_search',['pasien'=>$data]);

}
    
}


