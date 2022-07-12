@extends('layouts.dashboard')

@section('title')
    Projects Mahasiswa Sekolah Vokasi
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <div class="d-flex align-items-center">
                    <h2 class="dashboard-title">{{ $project->judul }}</h2>
                    @if ($project->status == "selesai")
                        <div class="badge rounded-pill bg-success p-2 text-white ml-2">Selesai</div>
                    @elseif ($project->status == "proses")
                        <div class="badge rounded-pill bg-info p-2 text-white ml-2">Proses</div>
                    @endif
                </div>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-project-edit', $project->id) }}" role="button">
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
                                <p>{!! $project->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Tanggal Mulai: </h5>
                                            <p class="ml-2">{{ $project->tanggal_mulai }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Tanggal Berakhir: </h5>
                                            <p class="ml-2">{{ $project->tanggal_selesai }}</p>
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