@extends('layouts.dashboard')

@section('title')
    Organisasi Mahasiswa Sekolah Vokasi
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">{{ $organisasi->nama }}</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-organisasi-edit', $organisasi->id) }}" role="button">
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
                                <p>{!! $organisasi->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Jabatan: </h5>
                                            <p class="ml-2">{{ $organisasi->jabatan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Mulai: </h5>
                                            <p class="ml-2">{{ $organisasi->waktu_mulai }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Divisi: </h5>
                                            <p class="ml-2">{{ $organisasi->divisi }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Berakhir: </h5>
                                            <p class="ml-2">{{ $organisasi->waktu_selesai }}</p>
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