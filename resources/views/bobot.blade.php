@extends('layouts.app')
@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="card">
      <div class="card-body p-4">
        <h5 class="card-title fw-semibold mb-4">Nilai Alternatif</h5>
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
                  <h6 class="fw-semibold mb-0">AI</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">A2</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">A3</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">A4</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">A5</h6>
                </th>
              </tr>
            </thead>
            <tbody>
                @php
                    $index = 0;
                @endphp
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
                      <p class="mb-0 fw-normal">{{ $cek_ipk[$index] }}</p>
                    </td>
                    <td class="border-bottom-0">
                      <p class="mb-0 fw-normal">{{ $cek_gaji[$index]}}</p>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ $cek_tanggungan[$index] }}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ $cek_prestasi[$index] }}</h6>
                    </td>
                    <td class="border-bottom-0">
                      <h6 class="fw-semibold mb-0 fs-4">{{ $cek_jarak[$index] }}</h6>
                    </td>
                </tr>
                @php
                    $index++;
                @endphp
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
  </div
@endsection
