<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekammedisController extends Controller
{
    public function index()
    {
        return view('v_rekammedis');
    }

}
