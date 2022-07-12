@extends('layouts.dashboard')

@section('title')
    Pengaturan Portofolio
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Portofolio Setting</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('portofolio-setting-update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{-- <label>Toko</label> --}}
                                                <p class="text-muted">
                                                Apakah anda ingin memperlihatkan portofolio?
                                                </p>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input
                                                        type="radio"
                                                        class="custom-control-input"
                                                        name="isPublic"
                                                        id="openStoreTrue"
                                                        value="1"
                                                        {{ $user->isPublic == 1 ? 'checked' : ''}}
                                                    />
                                                    <label
                                                        for="openStoreTrue"
                                                        class="custom-control-label"
                                                    >
                                                        Publik
                                                    </label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input
                                                        type="radio"
                                                        class="custom-control-input"
                                                        name="isPublic"
                                                        id="openStoreFalse"
                                                        value="0"
                                                        {{ $user->isPublic == 0 || $user->isPublic == NULL ? 'checked' : ''}}
                                                    />
                                                    <label
                                                        for="openStoreFalse"
                                                        class="custom-control-label"
                                                    >
                                                        Tidak Publik
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
@endsection