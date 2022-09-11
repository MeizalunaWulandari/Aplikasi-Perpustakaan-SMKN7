<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.home');
    }
    public function detail()
    {
        return view('siswa.detail');
    }
    public function allbook()
    {
        return view('siswa.allbook');
    }
}
