@extends('layouts.dashboard')

@section('title')
    Experience Mahasiswa Sekolah Vokasi
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">{{ $experience->jabatan }}</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-experiences-edit', $experience->id) }}" role="button">
                        Edit
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <h5>Deskripsi</h5>
                                <p>{!! $experience->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Perusahaan: </h5>
                                            <p class="ml-2">{{ $experience->perusahaan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Lokasi: </h5>
                                            <p class="ml-2">{{ $experience->lokasi_perusahaan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Mulai: </h5>
                                            <p class="ml-2">{{ $experience->waktu_mulai }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Bidang: </h5>
                                            <p class="ml-2">{{ $experience->bidang }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Status: </h5>
                                            <p class="ml-2">{{ $jabatan->status }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Berakhir: </h5>
                                            <p class="ml-2">{{ $experience->waktu_selesai }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection