@extends('template.appuser')
@section('title', 'Akurasi Sistem')
@section('content')
@php
    $numerator = $jumlahBenar;
    $denominator = $totalData;
    $hasilAkurasi = $akurasi;
@endphp

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async
        src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
</script>

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header text-center">Hasil Evaluasi Akurasi Sistem Pakar</h5>

        <div class="card-body">
            @auth
             <div class="alert alert-info">
   <br>
    <p>
        $$\text{Akurasi} = \frac{\text{Jumlah Prediksi Benar}}{\text{Jumlah Data Uji}} \times 100\%$$
    </p>

    <strong>Perhitungan:</strong><br>
    <p>
    \[
        \text{Akurasi} = \frac{\text{{$numerator}}}{\text{{$denominator }}} \times 100\% = {{ $hasilAkurasi }}\%
        \]
    </p>
</div>
       
@endauth

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <!-- <th>ID Dataset</th> -->
                            <th>Gejala</th>
                            <th>Diagnosa Pakar</th>
                            <th>Diagnosa Sistem</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hasilEvaluasi as $i => $row)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <!-- <td>{{ $row['id_dataset'] }}</td> -->
                            <td>  <ul class="mb-0 ps-3">
        @foreach ($row['gejala'] as $gejala)
            <li>{{ $gejala['nama'] }} ({{ $gejala['kode'] }})</li>
        @endforeach
    </ul></td>
                            <td>{{ $row['label_asli'] }}</td>
                            <td>{{ $row['prediksi'] }}</td>
                            <td>
                                @if($row['status'] == 'Benar')
                                    <span class="badge bg-success">Benar</span>
                                @else
                                    <span class="badge bg-danger">Salah</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end">Total Akurasinya Adalah </td>
                            <td >{{ $hasilAkurasi }} %</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
