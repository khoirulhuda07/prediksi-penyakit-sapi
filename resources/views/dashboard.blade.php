@extends('template.appuser')
@section('title', 'Dashboard')
@section('content')
<style>
/* Card Styles */
.cookieCard {
  width: 100%;
  min-height: 200px;
  background: linear-gradient(to right, rgb(137, 104, 255), rgb(175, 152, 255));
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
  gap: 20px;
  padding: 20px;
  position: relative;
  overflow: hidden;
  border-radius: 20px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}
.cookieCard:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 30px rgba(0,0,0,0.2);
}
.cookieCard::before {
  width: 150px;
  height: 150px;
  content: "";
  background: linear-gradient(to right, rgb(142, 110, 255), rgb(208, 195, 255));
  position: absolute;
  z-index: 1;
  border-radius: 50%;
  right: -25%;
  top: -25%;
}
.card-2 {
  background: linear-gradient(to right, rgb(255, 123, 172), rgb(255, 173, 204));
}
.card-2::before {
  background: linear-gradient(to right, rgb(255, 140, 180), rgb(255, 200, 220));
}
.card-3 {
  background: linear-gradient(to right, rgb(72, 202, 228), rgb(170, 240, 255));
}
.card-3::before {
  background: linear-gradient(to right, rgb(90, 215, 245), rgb(200, 250, 255));
}
.cookieHeading {
  font-size: 1.5em;
  font-weight: 600;
  color: rgb(241, 241, 241);
  z-index: 2;
}
.cookieDescription {
  font-size: 0.9em;
  color: rgb(241, 241, 241);
  z-index: 2;
}
.acceptButton {
  padding: 10px 18px;
  background-color: rgba(255, 255, 255, 0.2);
  border: none;
  color: white;
  font-weight: 600;
  z-index: 2;
  border-radius: 10px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}
.acceptButton:hover {
  background-color: rgba(255, 255, 255, 0.35);
}
</style>

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card">
    <div class="card-body">
      <div class="row g-4">

        <!-- Card 1: Jumlah Data Penyakit -->
        <div class="col-12 col-md-4">
          <a href="{{ url('/penyakit') }}" class="cookieCard">
            <p class="cookieHeading">Data Penyakit</p>
          </a>
        </div>

        <!-- Card 2: Daftar Gejala -->
        <div class="col-12 col-md-4">
            
          <div class="cookieCard card-2">
            <p class="cookieHeading">Data Gejala</p>
            <!--<p class="cookieDescription">Tersimpan {{$gejala}} gejala terkait penyakit untuk analisis.</p>-->
          </div>
        </div>

        <!-- Card 3: Jumlah User -->
        <div class="col-12 col-md-4">
          <div class="cookieCard card-3">
            <p class="cookieHeading">Akurasi Diagnosa</p>
            <p class="cookieDescription">Hasil akurasinya adalah {{$akurasi}} %</p>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Section Tambahan: Penjelasan Sistem dan Gambar -->
  <div class="mt-5 px-3">
    <div class="row align-items-center">
      <!-- Gambar Ilustrasi -->
      <div class="col-md-6 mb-3">
        <img src="{{ asset('user4/img/sapi.jfif') }}" 
             alt="Ilustrasi Sistem Pakar Penyakit Sapi" 
             style="width: 100%; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
      </div>

      <!-- Penjelasan Sistem -->
      <div class="col-md-6">
        <h4 class="mb-3">Tentang Sistem Pakar Penyakit Sapi</h4>
        <p style="font-size: 15px;">
          Sistem ini dirancang untuk membantu peternak dan pengguna dalam mendiagnosis penyakit sapi 
          berdasarkan gejala yang dialami. Sistem berbasis web ini menggunakan pendekatan sistem pakar 
          dengan data gejala dan penyakit yang telah dikaji oleh tenaga ahli.
        </p>
        <ul style="font-size: 14px;">
          <li>Identifikasi penyakit berdasarkan input gejala.</li>
          <!-- <li>Mempermudah monitoring kesehatan ternak secara mandiri.</li> -->
          <li>Disertai pengukuran akurasi sistem.</li>
          <li>Menampilkan data penyakit, gejala, dan pengguna sistem.</li>
        </ul>
        <p style="font-size: 15px;">
          Sistem ini terus dikembangkan untuk mendukung digitalisasi peternakan dan meningkatkan kualitas kesehatan hewan.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
