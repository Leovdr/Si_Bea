@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Data Mahasiswa Informatika 2021</h5>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
          style="margin-bottom: 2%;">
          Tambah Peserta Beasiswa
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Program Pendidikan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ route('daftarmahasiswa') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nama Mahasiswa :</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Program Pendidikan" name="nama">
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Program Pendidikan :</label>
                    <select class="form-select" aria-label="Default select example" name="fakultas">
                      <option selected>Pilih Program Pendidikan Anda</option> 
                      @foreach ($prodi as $prodi)
                      <option value="{{ $prodi->nama_prodi}} - {{$prodi->fakultas}}">{{ $prodi->nama_prodi}} - {{$prodi->fakultas}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">NIM :</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2"
                      placeholder="Masukkan Nama Fakultas atau Jurusan" name="nim">
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">IPK :</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2"
                      placeholder="Masukkan IPK anda" name="ipk">
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Gaji Orang Tua :</label>
                    <select class="form-select" aria-label="Default select example" name="gaji">
                      <option selected>Pilih Gaji Orang Tua/Wali</option>
                      <option value="Rp. 1.000.000 - Kebawah">Rp. 1.000.000 - Kebawah</option>
                      <option value="Rp. 1.500.000 - Rp.2.500.00">Rp. 1.500.000 - Rp.2.500.000</option>
                      <option value="Rp. 3.000.000 - Rp.4.000.000">Rp. 3.000.000 - Rp.4.000.000</option>
                      <option value="Lebih Dari Rp.4.000.000">Lebih Dari Rp.4.000.000</option>
                    </select>
                    <small style="color: red; margin-top: 2px">* Jika Tidak ada pada piihan bulatkan nominal gaji</small>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Jumlah Tanggungan :</label>
                    <select class="form-select" aria-label="Default select example" name="tanggungan">
                      <option selected>Masukkan Jumlah Tanggungan</option>
                      <option value="1 Orang">1 Orang</option>
                      <option value="2 Orang">2 Orang</option>
                      <option value="3 Orang">3 Orang</option>
                      <option value="Lebih Dari 3 Orang">Lebih Dari 3 Orang</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Prestasi :</label>
                    <select class="form-select" aria-label="Default select example" name="prestasi">
                      <option selected>Pilih tingkat prestasi</option>
                      <option value="Internasional">Internasional</option>
                      <option value="Nasional">Nasional</option>
                      <option value="Provinsi">Provinsi</option>
                      <option value="Tidak Ada Prestasi">Tidak Ada Prestasi</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Masukkan Jarak Rumah Ke Kampus :</label>
                    <select class="form-select" aria-label="Default select example" name="jarak">
                      <option selected>Pilih Jarak Anda Dari Rumah</option>
                      <option value="10 Km - Kebawah">10 Km - Kebawah</option>
                      <option value="11 Km - 15 Km">11 Km - 15 Km</option>
                      <option value="16 Km - 20 Km">16 Km - 20 Km</option>
                      <option value="Diatas 20 Km">Diatas 20 Km</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                </form>
            </div>
          </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">No.</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Nama Mahasiwa</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">IPK</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Penghasilan (bulan)</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Jumlah Tanggungan</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Prestasi</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Jarak menuju kampus (Km)</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  
                  @foreach ($peserta as $mahasiswa)
                  <tr>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-1">{{ $mahasiswa->nama }}</h6>
                      <small style="color: grey">{{ $mahasiswa->nim }}</small>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{ $mahasiswa->ipk }}</p>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{ $mahasiswa->gaji}}</p>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ $mahasiswa->tanggungan }}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ $mahasiswa->prestasi }}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ $mahasiswa->jarak }}</h6>
                    </td>
                  </tr>
                @endforeach
                
                </tbody>
              </table>
        </div>
      </div>
    </div>
    <div class="py-6 px-6 text-center">
      <p class="mb-0 fs-4">Design and Developed by <a href="https://adminmart.com/" target="_blank"
          class="pe-1 text-primary text-decoration-underline">AdminMart.com</a></p>
    </div>
  </div>
@endsection
