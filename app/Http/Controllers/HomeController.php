<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\peserta;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function pendaftar()
    {
        $peserta = peserta::all();
        return view('pendaftar', compact('peserta'));
    }

    public function hasil()
    {
        return view('hasil');
    }

    public function bobot()
    {
        return view('bobot');
    }


    public function matriks()
    {
        return view('matriks');
    }

    public function prefensi()
    {
        return view('prefensi');
    }

    public function ranking()
    {
        return view('ranking');
    }

    public function daftar()
    {
        //validasi read data pesertas
        $peserta = peserta::all();
        $prodi = jurusan::all();
        return view('daftar', compact('peserta', 'prodi'));
    }



    public function prodi()
    {
        $prodi = jurusan::all();
        return view('prodi', compact('prodi'));
    }
}
