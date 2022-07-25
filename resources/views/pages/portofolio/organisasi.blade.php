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
                        Add
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="">
                    @php $incrementOrganisasis = 0 @endphp
                    @forelse ($organisasis as $organisasi)
                        <div
                            {{-- class="col-6 col-md-3 col-lg-3" --}}
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementOrganisasis+= 100 }}"
                        >
                            <div class="card p-3 card-list">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>{{ $organisasi->nama }}</h5>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('portofolio-organisasi-edit', $organisasi->id )}}" class="edit icon">
                                            <img src="/images/pencil-square.svg" alt="" class="w-75" />
                                        </a>
                                        <a href="{{ route('portofolio-organisasi-delete', $organisasi->id )}}" class="delete icon ml-2">
                                            <img src="/images/trash.svg" alt="" class="w-75" />
                                        </a>
                                    </div>
                                </div>
                                <p class="my-0">{!! $organisasi->deskripsi !!}</p>
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
                                {{-- <div class="d-flex flex-row">
                                    <p>{{ $organisasi->jabatan }}</p>
                                    <p class="ml-2">{{ $organisasi->divisi }}</p>
                                </div>
                                @if (Str::length($organisasi->deskripsi) > 100)
                                    <div>{!! Str::substr($organisasi->deskripsi, 0, 100), "..." !!}</div>
                                @else
                                    <div>{!! $organisasi->deskripsi !!}</div>
                                @endif --}}
                            </div>
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