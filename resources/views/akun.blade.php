@extends('template.appuser')
@section('title', 'Data Akun')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
                <h5 class="card-header text-center">Data Akun</h5>
                
                <div class="card-body">
                <button class="btn btn-outline-primary mb-2"  type="button"
                         
                          data-bs-toggle="modal"
                          data-bs-target="#tambah">Tambah Akun</button>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>username</th>
                          <th>Email</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($user as $u)
                        <tr>
                          <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong>
                          </td>
                          <td>{{$u->name}}</td>
                          <td>{{$u->email}}</td>
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
                          data-bs-target="#edit{{$u->id}}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit Akun</a
                                >
                                <a class="dropdown-item" type="submit" href="javascript:void(0);" data-bs-toggle="modal"
                          data-bs-target="#hapus{{$u->id}}"
                                  ><i class="bx bx-trash me-1"></i> Delete</a
                                >
                              </div>
                            </div>
                          </td>
                        </tr>

                        <div class="modal fade" id="edit{{$u->id}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('akun/ubah/'.$u->id)}}" enctype="multipart/form-data">
                            @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal ubah Akun</h5>
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
                                    <label for="nameBasic" class="form-label">Username</label>
                                    <input type="text" id="nameBasic" name="name" class="form-control" placeholder="Masukkan Username" value="{{$u->name}}" required/>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Email</label>
                                    <input type="email" id="nameBasic" name="email" class="form-control" placeholder="Masukkan email" value="{{$u->email}}" required />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Password Baru</label>
                                    <input type="text" id="nameBasic" name="pw" class="form-control" placeholder="Masukkan password baru" />
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


                        <div class="modal fade" id="hapus{{$u->id}}" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('akun/hapus/'.$u->id)}}" enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Hapus Akun</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              <div class="modal-body">
                              <p style="word-wrap: break-word; white-space: normal;">apakah anda ingin menghapus dataset akun dengan username = <strong>{{$u->name}}</strong> ini ?</p>
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
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form method="POST" action="{{url('akun/tambah')}}" enctype="multipart/form-data">
                            @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Modal Tambah Akun</h5>
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
                                    <label for="nameBasic" class="form-label">Username</label>
                                    <input type="text" id="nameBasic" name="name" class="form-control" placeholder="Masukkan Username"  required/>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Email</label>
                                    <input type="email" id="nameBasic" name="email" class="form-control" placeholder="Masukkan email" required />
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Password</label>
                                    <input type="text" id="nameBasic" name="pw" class="form-control" placeholder="Masukkan password" required />
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