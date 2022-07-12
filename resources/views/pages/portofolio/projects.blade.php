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
                <h2 class="dashboard-title">Projects</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-projects-create') }}" role="button">
                        Add Project
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    @php $incrementProjets = 0 @endphp
                    @forelse ($projects as $project)
                        <div
                            class="col-6 col-md-3 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementProjets+= 100 }}"
                        >
                            <a href="{{ route('portofolio-projects-detail', $project->id) }}" class="text-decoration-none text-body">
                                <div class="card p-3 card-list">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6>{{ $project->judul }}</h6>
                                        <a href="{{ route('portofolio-project-delete', $project->id )}}" class="delete-gallery">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                    @if ($project->status == "selesai")
                                        <div class="badge rounded-pill bg-success w-25 text-white">Selesai</div>
                                    @elseif ($project->status == "proses")
                                        <div class="badge rounded-pill bg-info w-25 text-white">Proses</div>
                                    @endif
                                    @if (Str::length($project->deskripsi) > 100)
                                        <div>{!! Str::substr($project->deskripsi, 0, 100), "..." !!}</div>
                                    @else
                                        <div>{!! $project->deskripsi !!}</div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada Project
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection