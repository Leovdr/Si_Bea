@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Data Mahasiswa Informatika Lolos Beasiswa</h5>
        <div class="search">
          <input placeholder="Masukkan Nama Peserta..." type="text">
          <button type="submit">Cari</button>
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
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">1</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1">Fachry Rizky .P</h6>
                  <span class="fw-normal">E41212057</span>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">3.98</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">Rp. xxx.xxx.x</p>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">2 Orang</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">Internasional</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">XX</h6>
                </td>
              </tr>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">1</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1">Fachry Rizky .P</h6>
                  <span class="fw-normal">E41212057</span>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">3.98</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">Rp. xxx.xxx.x</p>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">2 Orang</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">Internasional</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">XX</h6>
                </td>
              </tr>
              <tr>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">1</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-1">Fachry Rizky .P</h6>
                  <span class="fw-normal">E41212057</span>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">3.98</p>
                </td>
                <td class="border-bottom-0">
                  <p class="mb-0 fw-normal">Rp. xxx.xxx.x</p>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">2 Orang</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">Internasional</h6>
                </td>
                <td class="border-bottom-0">
                  <h6 class="fw-semibold mb-0 fs-4">XX</h6>
                </td>
              </tr>
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