@extends('template.appuser')
@section('title', 'Data Gejala')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
                <h5 class="card-header text-center">Data Gejala</h5>
                
                <div class="card-body">
                <button class="btn btn-outline-primary mb-2"  type="button"
                         
                          data-bs-toggle="modal"
                          data-bs-target="#tambah">Tambah Gejala</button>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          
                          <th>Gejala</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($gejala as $g)
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong>
                          </td>
                          <td>{{$g->GEJALA}} ({{$g->KODE_GEJALA}})</td>
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
                          data-bs-target="#edit{{$g->ID_GEJALA}}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit Gejala</a
                                >
                                <a class="dropdown-item" type="submit" href="javascript:void(0);" data-bs-toggle="modal"
                          data-bs-target="#hapus{{$g->ID_GEJALA}}"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                          <div class="modal fade" id="hapus{{$g->ID_GEJALA}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('gejala/delete/'.$g->ID_GEJALA)}}" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Hapus Gejala</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                               <p style="word-wrap: break-word; white-space: normal;">apakah anda ingin menghapus gejala  <strong>{{$g->GEJALA}}</strong> ini ?</p>
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




                          <div class="modal fade" id="edit{{$g->ID_GEJALA}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('gejala/update/'.$g->ID_GEJALA)}}" enctype="multipart/form-data">
                            @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Edit Gejala</h5>
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
                                    <label for="nameBasic" class="form-label">Kode Gelaja</label>
                                    <input type="text" id="nameBasic" name="kode" class="form-control" placeholder="Masukkan Kode Gejala" value="{{$g->KODE_GEJALA}}" />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Nama Gejala</label>
                                    <input type="text" id="nameBasic" name="gejala" class="form-control" placeholder="Masukkan nama Gejala" value="{{$g->GEJALA}}" />
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
                            <form method="POST" action="{{url('gejala/tambah')}}" enctype="multipart/form-data">
                            @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Tambah Gejala</h5>
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
                                    <label for="nameBasic" class="form-label">Kode Gelaja</label>
                                    <input type="text" id="nameBasic" name="kode" class="form-control" placeholder="Masukkan Kode Gejala"  required/>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Nama Gejala</label>
                                    <input type="text" id="nameBasic" name="gejala" class="form-control" placeholder="Masukkan nama Gejala" required />
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