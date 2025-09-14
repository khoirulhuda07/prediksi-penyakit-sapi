@extends('template.appuser')
@section('title', 'dataset')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
                <h5 class="card-header text-center">Dataset</h5>
                
                <div class="card-body">
                <button class="btn btn-outline-primary mb-2"  type="button"
                         
                          data-bs-toggle="modal"
                          data-bs-target="#tambah">Tambah Dataset</button>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Daftar Penyakit</th>
                          <th>Gejala</th>
                       
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($dataEvaluasi as $data)
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong>
                          </td>
                          <td>{{$data['label_penyakit']}} ({{$data['kode_penyakit']}})</td>
                       
                          <td> <ul class="mb-0 ps-3">
                        @foreach ($data['gejala'] as $gejala)
                            <li>{{ $gejala['nama'] }} ({{ $gejala['kode']  }})</li>
                        @endforeach
                    </ul></td>
                    
                          <td>
                            <div class="dropdown">
                              <button
                                type="button"
                                class="btn p-0 dropdown-toggle hide-arrow"
                                data-bs-toggle="dropdown"
                              >
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" type="button" href="javascript:void(0);" data-bs-toggle="modal"
                          data-bs-target="#edit{{$data['id_dataset']}}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit Dataset</a
                                >
                                <a class="dropdown-item" type="button" href="javascript:void(0);" data-bs-toggle="modal"
                          data-bs-target="#hapus{{$data['id_dataset']}}"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            
                          </td>

                        </tr>

                        <div class="modal fade" id="edit{{ $data['id_dataset'] }}" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ url('dataset/ubah/' . $data['id_dataset']) }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Edit Dataset</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Pilih Penyakit</label>
            <select name="penyakit" class="form-select" required>
              @foreach ($allPenyakit as $penyakit)
                <option value="{{ $penyakit->KODE_PENYAKIT }}" {{ $penyakit->KODE_PENYAKIT == $data['kode_penyakit'] ? 'selected' : '' }}>
                  {{ $penyakit->PENYAKIT }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Pilih Gejala Terkait:</label>
            <div class="row">
            @foreach ($allGejala as $gejala)
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input"  type="checkbox" name="gejala[]" value="{{ $gejala->KODE_GEJALA }}" {{ in_array($gejala->KODE_GEJALA, array_column($data['gejala'], 'kode')) ? 'checked' : '' }}>
                    <label class="form-check-label " style="word-wrap: break-word; white-space: normal;">{{ $gejala->GEJALA }}</label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="hapus{{$data['id_dataset']}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('dataset/hapus/'.$data['id_dataset'])}}" enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Hapus Dataset</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                              <p style="word-wrap: break-word; white-space: normal;">apakah anda ingin menghapus dataset dengan penyakit <strong>{{$data['label_penyakit']}}</strong> ini ?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Tutup
                                </button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>

                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form method="POST" action="{{ url('dataset/tambah') }}">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Tambah Dataset</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Pilih Penyakit</label>
            <select name="penyakit" class="form-select" required>
              <option value="">-- Pilih Penyakit --</option>
              @foreach ($allPenyakit as $penyakit)
                <option value="{{ $penyakit->KODE_PENYAKIT }}">{{ $penyakit->PENYAKIT }}</option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Pilih Gejala Terkait:</label>
            <div class="row">
              @foreach ($allGejala as $gejala)
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="gejala[]" value="{{ $gejala->KODE_GEJALA }}">
                    <label class="form-check-label">{{ $gejala->GEJALA }}</label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
              
                              
@endsection