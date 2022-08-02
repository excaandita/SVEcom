@extends('layouts.dashboard')

@section('title')
    Biodata Mahasiswa Sekolah Vokasi
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">BIODATA</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-biodata-create') }}" role="button">
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
                                <p>{!! $user->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Tempat Lahir: </h5>
                                            <p class="ml-2">{{ $user->tempat_lahir }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Tanggal Lahir: </h5>
                                            <p class="ml-2">{{ $user->tanggal_lahir }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Alamat KTP: </h5>
                                            <p class="ml-2">{{ $user->address_one }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Angkatan: </h5>
                                            <p class="ml-2">{{ $user->angkatan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>No Telepon: </h5>
                                            <p class="ml-2">{{ $user->phone_number }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Fakultas: </h5>
                                            <p class="ml-2">{{ $user->fakultas }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Program Studi: </h5>
                                            @if ($prodi == null)
                                                <p class="ml-2">Belum ada Program Studi</p>
                                            @else
                                                <p class="ml-2">{{ $prodi->nama }}</p>
                                            @endif
                                        </div>
                                        <div class="d-flex">
                                            <h5>Alamat Solo: </h5>
                                            <p class="ml-2">{{ $user->alamat_solo }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>NIM: </h5>
                                            <p class="ml-2">{{ $user->nim }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Email: </h5>
                                            <p class="ml-2">{{ $user->email }}</p>
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