@extends('layouts.dashboard')

@section('title')
    Dashboard Setting-Sekolah Vokasi E-COM
@endsection

@section('content')
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
>
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Store Setting</h2>
            <p class="dashboard-subtitle">Look what you have made today!</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
              <div class="col-12">
                <form action="{{ route('dashboard-setting-redirect', 'dashboard-setting-store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nama Toko</label>
                            <input type="text" class="form-control" name="store_name" value="{{ $user->store_name}}"/>
                          </div>
                        </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Toko</label>
                                <p class="text-muted">
                                  Apakah anda juga ingin membuka Toko dan
                                  memulai berjualan?
                                </p>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    type="radio"
                                    class="custom-control-input"
                                    name="store_status"
                                    id="openStoreTrue"
                                    value="1"
                                    {{ $user->store_status == 1 ? 'checked' : ''}}
                                  />
                                  <label
                                    for="openStoreTrue"
                                    class="custom-control-label"
                                  >
                                    Buka
                                  </label>
                                </div>
                                <div
                                  class="custom-control custom-radio custom-control-inline"
                                >
                                  <input
                                    type="radio"
                                    class="custom-control-input"
                                    name="store_status"
                                    id="openStoreFalse"
                                    value="0"
                                    {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : ''}}
                                  />
                                  <label
                                    for="openStoreFalse"
                                    class="custom-control-label"
                                  >
                                    Tutup Sementara
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Simpan
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection