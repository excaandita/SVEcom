@extends('layouts.dashboard')

@section('title')
    Kepanitiaan Mahasiswa Sekolah Vokasi
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Kepanitiaan</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-kepanitiaan-create') }}" role="button">
                        Add Kepanitiaan
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    @php $incrementKepanitiaans = 0 @endphp
                    @forelse ($kepanitiaans as $kepanitiaan)
                        <div
                            class="col-6 col-md-3 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementKepanitiaans+= 100 }}"
                        >
                            <a href="{{ route('portofolio-kepanitiaan-detail', $kepanitiaan->id) }}" class="text-decoration-none text-body">
                                <div class="card p-3 card-list">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6>{{ $kepanitiaan->nama_acara }}</h6>
                                        <a href="{{ route('portofolio-kepanitiaan-delete', $kepanitiaan->id )}}" class="delete-gallery">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <p>{{ $kepanitiaan->nama_jabatan }}</p>
                                        <p class="ml-2">{{ $kepanitiaan->divisi }}</p>
                                    </div>
                                    @if (Str::length($kepanitiaan->deskripsi) > 100)
                                        <div>{!! Str::substr($kepanitiaan->deskripsi, 0, 100), "..." !!}</div>
                                    @else
                                        <div>{!! $kepanitiaan->deskripsi !!}</div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada Kepanitiaan
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection