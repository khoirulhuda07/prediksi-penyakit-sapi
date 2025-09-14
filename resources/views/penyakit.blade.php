@extends('template.appuser')
@section('title', 'Data Penyakit')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
@guest
    <h5 class="card-header text-center">Data Penyakit dan Gejala</h5>
@else
    <h5 class="card-header text-center">Data Penyakit</h5>
@endguest   
                <div class="card-body">
                  @auth
                <button class="btn btn-outline-primary mb-2"  type="button"
                         
                          data-bs-toggle="modal"
                          data-bs-target="#tambah">Tambah Penyakit</button>
                          @endauth
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Daftar Penyakit</th>
                          <th>Gejala</th>
                          <th>Solusi</th>
        <th>Pencegahan</th>
       @auth
                          <th>Aksi</th>
                          @endauth
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($penyakitList as $penyakit)
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong>
                          </td>
                          <td>{{$penyakit->PENYAKIT}} ({{$penyakit->KODE_PENYAKIT}})</td>
                       
                          <td> <ul class="mb-0 ps-3">
                        @foreach ($penyakit->gejala as $rule)
                            <li>{{ $rule->GEJALA }} ({{ $rule->KODE_GEJALA }})</li>
                        @endforeach
                    </ul></td>
                    <td >{{ $penyakit->solusi }}</td>
<td>{{ $penyakit->pencegahan }}</td>
@auth
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
                          data-bs-target="#edit{{$penyakit->ID_PENYAKIT}}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit Penyakit</a
                                >
                                <a class="dropdown-item" type="button" href="javascript:void(0);" data-bs-toggle="modal"
                          data-bs-target="#hapus{{$penyakit->ID_PENYAKIT}}"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                          @endauth
                          <div class="modal fade" id="hapus{{$penyakit->ID_PENYAKIT}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('penyakit/delete/'.$penyakit->ID_PENYAKIT)}}" enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Hapus Penyakit</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                              <p style="word-wrap: break-word; white-space: normal;">apakah anda ingin menghapus Penyakit  <strong>{{$penyakit->PENYAKIT}}</strong> ini ?</p>
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




                          <div class="modal fade" id="edit{{$penyakit->ID_PENYAKIT}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('penyakit/update/'.$penyakit->ID_PENYAKIT)}}" enctype="multipart/form-data">
                            @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Edit Penyakit</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                              <div class="mb-3">
                          <label class="form-label">Kode Penyakit</label>
                          <input type="text" name="kode" class="form-control" value="{{ $penyakit->KODE_PENYAKIT }}" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label">Nama Penyakit</label>
                          <input type="text" name="penyakit" class="form-control" value="{{ $penyakit->PENYAKIT }}" required>
                        </div>
                        <div class="mb-3">
  <label class="form-label">Solusi</label>
  <textarea name="solusi" class="form-control" rows="3">{{ $penyakit->solusi }}</textarea>
</div>
<div class="mb-3">
  <label class="form-label">Pencegahan</label>
  <textarea name="pencegahan" class="form-control" rows="3">{{ $penyakit->pencegahan }}</textarea>
</div>

                          <!-- Daftar Gejala (Checkbox) -->
                          <div class="mb-3">
                            <label class="form-label">Pilih Gejala Terkait:</label>
                            <div class="row">
                              @foreach ($allGejala as $gejala)
                                <div class="col-md-4">
                                  <div class="form-check">
                                    <input class="form-check-input" 
                                          type="checkbox" 
                                          name="gejala[]" 
                                          value="{{ $gejala->ID_GEJALA }}"
                                          {{ $penyakit->gejala->contains('ID_GEJALA', $gejala->ID_GEJALA) ? 'checked' : '' }}>
                                    <label class="form-check-label" style="word-wrap: break-word; white-space: normal;">
                                      {{ $gejala->GEJALA }}
                                    </label>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                          </div>
                       
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                 Tutup
                                </button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </div>
                            </form>
                          </div>
                        </div>
                        </tr>
                       @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('penyakit/tambah')}}" enctype="multipart/form-data">
                            @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Tambah Penyakit</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Kode Penyakit</label>
                                    <input type="text" id="nameBasic" name="kode" class="form-control" placeholder="Masukkan Kode Penyakit`"  required/>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Nama Penyakit</label>
                                    <input type="text" id="nameBasic" name="penyakit" class="form-control" placeholder="Masukkan nama Penyakit`" required />
                                  </div>
                                  
                                </div>
                                <div class="row">
  <div class="col mb-3">
    <label for="solusi" class="form-label">Solusi</label>
    <textarea name="solusi" class="form-control" placeholder="Masukkan Solusi" rows="3"></textarea>
  </div>
</div>
<div class="row">
  <div class="col mb-3">
    <label for="pencegahan" class="form-label">Pencegahan</label>
    <textarea name="pencegahan" class="form-control" placeholder="Masukkan Pencegahan" rows="3"></textarea>
  </div>
</div>
                               
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Tutup
                                </button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
@endsection