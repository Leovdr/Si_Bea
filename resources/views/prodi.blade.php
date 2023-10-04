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
          Tambah Prodi
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
                <form action="{{ route('prosestambah') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Program Pendidikan :</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Nama Program Pendidikan" name="nama_prodi">
                  </div>
                  <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Jurusan atau Fakultas</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2"
                      placeholder="Masukkan Nama Fakultas atau Jurusan" name="fakultas">
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
                  <h6 class="fw-semibold mb-0">Program Pendidikan</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Fakultas/Jurusan</h6>
                </th>
              </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($prodi as $data)
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">{{ $no++ }}</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">{{ $data->nama_prodi }}</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">{{$data->fakultas}}</h6>
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