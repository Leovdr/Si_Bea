<?php

namespace App\Http\Controllers;

use App\Models\jurusan;
use App\Models\peserta;

use Illuminate\Http\Request;

class systemcontroller extends Controller
{

    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama_prodi' => 'required',
            'fakultas' => 'required',
        ]);

        $prodi = new jurusan();
        $prodi->nama_prodi = $request->nama_prodi;
        $prodi->fakultas = $request->fakultas;
        $prodi->save();
        return redirect()->route('TambahProdi')
            ->with('success', 'Program Pendidikan Berhasil Ditambahkan');
    }
    public function daftarmahasiswa(Request $request)
    {
        //validasi create pada halaman daftar blade
        $validated = $request->validate([
            'nama' => 'required',
            'fakultas' => 'required',
            'nim' => 'required',
            'ipk' => 'required',
            'gaji' => 'required',
            'tanggungan' => 'required',
            'prestasi' => 'required',
            'jarak' => 'required',
        ]);

        //perintah create ke database pesertas
        $peserta = new peserta();
        $peserta->nama = $request->nama;
        $peserta->fakultas = $request->fakultas;
        $peserta->nim = $request->nim;
        $peserta->ipk = $request->ipk;
        $peserta->gaji = $request->gaji;
        $peserta->tanggungan = $request->tanggungan;
        $peserta->prestasi = $request->prestasi;
        $peserta->jarak = $request->jarak;
        $peserta->save();
        return redirect()->route('daftar')
            ->with('success', 'Data Berhasil Ditambahkan');
    }

    public function kondisi()
    {
        $peserta = peserta::all();

        $cek_ipk = [];
        $cek_gaji = [];
        $cek_tanggungan = [];
        $cek_prestasi = [];
        $cek_jarak = [];

        foreach ($peserta as $p) {
            if ($p->ipk <= 4.0) {
                $hasil_ipk = 4;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.67) {
                $hasil_ipk = 3;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.34) {
                $hasil_ipk = 2;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.0) {
                $hasil_ipk = 1;
                array_push($cek_ipk, $hasil_ipk);
            } else {
                $hasil_ipk = 0;
                array_push($cek_ipk, $hasil_ipk);
            }


            if ($p->gaji == 'Lebih Dari Rp.4.000.000') {
                $hasil_gaji = 1;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 3.000.000 - Rp.4.000.000') {
                $hasil_gaji = 2;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 1.500.000 - Rp.2.500.000') {
                $hasil_gaji = 3;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 1.000.000 - Kebawah') {
                $hasil_gaji = 4;
                array_push($cek_gaji, $hasil_gaji);
            } else {
                $hasil_gaji = 0;
                array_push($cek_gaji, $hasil_gaji);
            }


            if ($p->tanggungan == '1 Orang') {
                $hasil_tanggungan = 1;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == '2 Orang') {
                $hasil_tanggungan = 2;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == '3 Orang') {
                $hasil_tanggungan = 3;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == 'Lebih Dari 3 Orang') {
                $hasil_tanggungan = 4;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } else {
                $hasil_tanggungan = 0;
                array_push($cek_tanggungan, $hasil_tanggungan);
            }


            if ($p->prestasi == 'Internasional') {
                $hasil_prestasi = 4;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Nasional') {
                $hasil_prestasi = 3;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Provinsi') {
                $hasil_prestasi = 2;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Tidak Ada Prestasi') {
                $hasil_prestasi = 1;
                array_push($cek_prestasi, $hasil_prestasi);
            } else {
                $hasil_prestasi = 0;
                array_push($cek_prestasi, $hasil_prestasi);
            }

            if ($p->jarak == '10 Km - Kebawah') {
                $hasil_jarak = 1;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == '11 Km - 15 Km') {
                $hasil_jarak = 2;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == '16 Km - 20 Km') {
                $hasil_jarak = 3;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == 'Diatas 20 Km') {
                $hasil_jarak = 4;
                array_push($cek_jarak, $hasil_jarak);
            } else {
                $hasil_jarak = 0;
                array_push($cek_jarak, $hasil_jarak);
            }
        }

        return view('bobot  ', compact('peserta', 'cek_ipk', 'cek_gaji', 'cek_tanggungan', 'cek_prestasi', 'cek_jarak'));
    }

    public function matriks()
    {
        //perintah penghitungan simpel addtive weighting dari function kondisi diatas
        $peserta = peserta::all();

        $cek_ipk = [];
        $cek_gaji = [];
        $cek_tanggungan = [];
        $cek_prestasi = [];
        $cek_jarak = [];

        foreach ($peserta as $p) {
            if ($p->ipk <= 4.0) {
                $hasil_ipk = 4;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.67) {
                $hasil_ipk = 3;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.34) {
                $hasil_ipk = 2;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.0) {
                $hasil_ipk = 1;
                array_push($cek_ipk, $hasil_ipk);
            } else {
                $hasil_ipk = 0;
                array_push($cek_ipk, $hasil_ipk);
            }


            if ($p->gaji == 'Lebih Dari Rp.4.000.000') {
                $hasil_gaji = 1;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 3.000.000 - Rp.4.000.000') {
                $hasil_gaji = 2;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 1.500.000 - Rp.2.500.000') {
                $hasil_gaji = 3;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 1.000.000 - Kebawah') {
                $hasil_gaji = 4;
                array_push($cek_gaji, $hasil_gaji);
            } else {
                $hasil_gaji = 0;
                array_push($cek_gaji, $hasil_gaji);
            }


            if ($p->tanggungan == '1 Orang') {
                $hasil_tanggungan = 1;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == '2 Orang') {
                $hasil_tanggungan = 2;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == '3 Orang') {
                $hasil_tanggungan = 3;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == 'Lebih Dari 3 Orang') {
                $hasil_tanggungan = 4;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } else {
                $hasil_tanggungan = 0;
                array_push($cek_tanggungan, $hasil_tanggungan);
            }


            if ($p->prestasi == 'Internasional') {
                $hasil_prestasi = 4;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Nasional') {
                $hasil_prestasi = 3;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Provinsi') {
                $hasil_prestasi = 2;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Tidak Ada Prestasi') {
                $hasil_prestasi = 1;
                array_push($cek_prestasi, $hasil_prestasi);
            } else {
                $hasil_prestasi = 0;
                array_push($cek_prestasi, $hasil_prestasi);
            }

            if ($p->jarak == '10 Km - Kebawah') {
                $hasil_jarak = 1;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == '11 Km - 15 Km') {
                $hasil_jarak = 2;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == '16 Km - 20 Km') {
                $hasil_jarak = 3;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == 'Diatas 20 Km') {
                $hasil_jarak = 4;
                array_push($cek_jarak, $hasil_jarak);
            } else {
                $hasil_jarak = 0;
                array_push($cek_jarak, $hasil_jarak);
            }
        }

        //perintah penghitungan matriks dibagi nilai max
        $max_ipk = max($cek_ipk);
        $max_gaji = max($cek_gaji);
        $max_tanggungan = max($cek_tanggungan);
        $max_prestasi = max($cek_prestasi);
        $max_jarak = max($cek_jarak);

        $matriks_ipk = [];
        $matriks_gaji = [];
        $matriks_tanggungan = [];
        $matriks_prestasi = [];
        $matriks_jarak = [];

        foreach ($cek_ipk as $ipk) {
            $hasil_ipk = $ipk / $max_ipk;
            array_push($matriks_ipk, $hasil_ipk);
        }

        foreach ($cek_gaji as $gaji) {
            $hasil_gaji = $gaji / $max_gaji;
            array_push($matriks_gaji, $hasil_gaji);
        }

        foreach ($cek_tanggungan as $tanggungan) {
            $hasil_tanggungan = $tanggungan / $max_tanggungan;
            array_push($matriks_tanggungan, $hasil_tanggungan);
        }

        foreach ($cek_prestasi as $prestasi) {
            $hasil_prestasi = $prestasi / $max_prestasi;
            array_push($matriks_prestasi, $hasil_prestasi);
        }

        foreach ($cek_jarak as $jarak) {
            $hasil_jarak = $jarak / $max_jarak;
            array_push($matriks_jarak, $hasil_jarak);
        }

        return view('matriks', compact('peserta', 'matriks_ipk', 'matriks_gaji', 'matriks_tanggungan', 'matriks_prestasi', 'matriks_jarak'));
    }

    public function preferensi()
    {
        //perintah penghitungan simpel addtive weighting dari function kondisi diatas
        $peserta = peserta::all();

        $cek_ipk = [];
        $cek_gaji = [];
        $cek_tanggungan = [];
        $cek_prestasi = [];
        $cek_jarak = [];

        foreach ($peserta as $p) {
            if ($p->ipk <= 4.0) {
                $hasil_ipk = 4;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.67) {
                $hasil_ipk = 3;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.34) {
                $hasil_ipk = 2;
                array_push($cek_ipk, $hasil_ipk);
            } elseif ($p->ipk <= 3.0) {
                $hasil_ipk = 1;
                array_push($cek_ipk, $hasil_ipk);
            } else {
                $hasil_ipk = 0;
                array_push($cek_ipk, $hasil_ipk);
            }


            if ($p->gaji == 'Lebih Dari Rp.4.000.000') {
                $hasil_gaji = 1;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 3.000.000 - Rp.4.000.000') {
                $hasil_gaji = 2;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 1.500.000 - Rp.2.500.000') {
                $hasil_gaji = 3;
                array_push($cek_gaji, $hasil_gaji);
            } elseif ($p->gaji == 'Rp. 1.000.000 - Kebawah') {
                $hasil_gaji = 4;
                array_push($cek_gaji, $hasil_gaji);
            } else {
                $hasil_gaji = 0;
                array_push($cek_gaji, $hasil_gaji);
            }


            if ($p->tanggungan == '1 Orang') {
                $hasil_tanggungan = 1;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == '2 Orang') {
                $hasil_tanggungan = 2;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == '3 Orang') {
                $hasil_tanggungan = 3;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } elseif ($p->tanggungan == 'Lebih Dari 3 Orang') {
                $hasil_tanggungan = 4;
                array_push($cek_tanggungan, $hasil_tanggungan);
            } else {
                $hasil_tanggungan = 0;
                array_push($cek_tanggungan, $hasil_tanggungan);
            }


            if ($p->prestasi == 'Internasional') {
                $hasil_prestasi = 4;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Nasional') {
                $hasil_prestasi = 3;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Provinsi') {
                $hasil_prestasi = 2;
                array_push($cek_prestasi, $hasil_prestasi);
            } elseif ($p->prestasi == 'Tidak Ada Prestasi') {
                $hasil_prestasi = 1;
                array_push($cek_prestasi, $hasil_prestasi);
            } else {
                $hasil_prestasi = 0;
                array_push($cek_prestasi, $hasil_prestasi);
            }


            if ($p->jarak == '10 Km - Kebawah') {
                $hasil_jarak = 1;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == '11 Km - 15 Km') {
                $hasil_jarak = 2;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == '16 Km - 20 Km') {
                $hasil_jarak = 3;
                array_push($cek_jarak, $hasil_jarak);
            } elseif ($p->jarak == 'Diatas 20 Km') {
                $hasil_jarak = 4;
                array_push($cek_jarak, $hasil_jarak);
            } else {
                $hasil_jarak = 0;
                array_push($cek_jarak, $hasil_jarak);
            }
        }



        //perintah penghitungan matriks dibagi nilai max
        $max_ipk = max($cek_ipk);
        $max_gaji = max($cek_gaji);
        $max_tanggungan = max($cek_tanggungan);
        $max_prestasi = max($cek_prestasi);
        $max_jarak = max($cek_jarak);

        $matriks_ipk = [];
        $matriks_gaji = [];
        $matriks_tanggungan = [];
        $matriks_prestasi = [];
        $matriks_jarak = [];

        foreach ($cek_ipk as $ipk) {
            $hasil_ipk = $ipk / $max_ipk;
            array_push($matriks_ipk, $hasil_ipk);
        }

        foreach ($cek_gaji as $gaji) {
            $hasil_gaji = $gaji / $max_gaji;
            array_push($matriks_gaji, $hasil_gaji);
        }

        foreach ($cek_tanggungan as $tanggungan) {
            $hasil_tanggungan = $tanggungan / $max_tanggungan;
            array_push($matriks_tanggungan, $hasil_tanggungan);
        }

        foreach ($cek_prestasi as $prestasi) {
            $hasil_prestasi = $prestasi / $max_prestasi;
            array_push($matriks_prestasi, $hasil_prestasi);
        }

        foreach ($cek_jarak as $jarak) {
            $hasil_jarak = $jarak / $max_jarak;
            array_push($matriks_jarak, $hasil_jarak);
        }

        //perintah penghitungan preferensi dari matriks yang sudah dihitung dan hasil dari masing masing perkalian dimasukkan ke dalam matrix preferensi
        $preferensi = [];
        $hasil_preferensi = [];

        for ($i = 0; $i < count($peserta); $i++) {
            $hasil_preferensi[$i] = ($matriks_ipk[$i] * 0.3) + ($matriks_gaji[$i] * 0.2) + ($matriks_tanggungan[$i] * 0.2) + ($matriks_prestasi[$i] * 0.2) + ($matriks_jarak[$i] * 0.1);
            array_push($preferensi, $hasil_preferensi[$i]);
        }

        return view('prefensi', compact('peserta', 'preferensi'));
    }

    public function rangking()
    {
    }
}
