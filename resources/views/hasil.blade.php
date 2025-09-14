@extends('template.appuser')
@section('title', 'hasil diagnosa')
@section('content')
<!-- MathJax CDN -->
<script>
MathJax = {
  tex: { inlineMath: [['$', '$'], ['\\(', '\\)']] },
  svg: { fontCache: 'global' }
};
</script>
<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-svg.js" async></script>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card shadow-sm">
        <h4 class="card-header text-center fw-bold">🩺 Hasil Diagnosa Penyakit Sapi</h4>
        <h5 class="card-header text-center fw-bold">
            Gejala yang anda pilih adalah {{ $daftarGejalaDipilih->pluck('GEJALA')->implode(', ') }}
        </h5>

        <div class="card-body">
           @auth
           <p>
    \(P(Y|X) = \frac{P(Y) \cdot \prod_{i=1}^{q} P(X_i|Y)}{P(X)}\)  
</p>
<p><strong>Dimana:</strong></p>
<ul>
    <li>\(P(Y|X)\) : Probabilitas data dengan vetor X pada kelas Y</li>
    <li>\(P(Y)\) : Probabilitas awal (prior) kelas Y</li>
    <li>\(\prod_{i=1}^{q} P(X_i|Y)\) : Probabilitas independen kelas Y dari semua fitur dalam factor X</li>
    <!-- <li>\(P(X)\): Probabilitas gejala (bisa diabaikan untuk pembandingan antar kelas)</li> -->
</ul>




            <h6 class="mt-4">Perhitungan Probabilitas (Naive Bayes)</h6>
            <div class="table-responsive">

           
            <table class="table table-bordered table-striped mb-2">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Penyakit</th>
                        <th>Rumus</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hasilPrediksi as $hasil)
                    <tr>
                        <td>{{ $hasil['kode'] }}</td>
                        <td>{{ $hasil['nama'] }}</td>
                        <td>{!! $hasil['rumus'] !!}</td>
                        <td><strong>{{ number_format($hasil['probabilitas'], 8) }}</strong></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            @endauth

            @if($hasilTertinggi)
            <div class="alert alert-primary text-center fw-bold">
                ✅ Berdasarkan gejala yang Anda pilih, sapi kemungkinan besar menderita:<br>
                <span class="text-primary fs-4">{{ $hasilTertinggi['nama'] }}</span><br>
               @auth
                    <span class="text-muted">(dengan Nilai Probabilitas: {{ number_format($hasilTertinggi['probabilitas'], 6) }})</span>
                @endauth
            </div>

            <div class="mt-4">
                <h5 class="fw-bold">🩹 Solusi</h5>
                <p>{{ $hasilTertinggi['solusi'] }}</p>

                <h5 class="fw-bold">🛡️ Pencegahan</h5>
                <p>{{ $hasilTertinggi['pencegahan'] }}</p>
            </div>
            @else
            <div class="alert alert-warning text-center">
                ⚠️ Maaf, tidak ditemukan hasil diagnosa berdasarkan gejala yang Anda pilih.
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
