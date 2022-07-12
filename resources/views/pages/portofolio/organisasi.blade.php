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
                <h2 class="dashboard-title">Organisasi</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-organisasi-create') }}" role="button">
                        Add Organisasi
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    @php $incrementOrganisasis = 0 @endphp
                    @forelse ($organisasis as $organisasi)
                        <div
                            class="col-6 col-md-3 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementOrganisasis+= 100 }}"
                        >
                            <a href="{{ route('portofolio-organisasi-detail', $organisasi->id) }}" class="text-decoration-none text-body">
                                <div class="card p-3 card-list">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6>{{ $organisasi->nama }}</h6>
                                        <a href="{{ route('portofolio-organisasi-delete', $organisasi->id )}}" class="delete-gallery">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <p>{{ $organisasi->jabatan }}</p>
                                        <p class="ml-2">{{ $organisasi->divisi }}</p>
                                    </div>
                                    @if (Str::length($organisasi->deskripsi) > 100)
                                        <div>{!! Str::substr($organisasi->deskripsi, 0, 100), "..." !!}</div>
                                    @else
                                        <div>{!! $organisasi->deskripsi !!}</div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada Organisasi
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection