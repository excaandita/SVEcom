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
                        Add
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="">
                    @php $incrementKepanitiaans = 0 @endphp
                    @forelse ($kepanitiaans as $kepanitiaan)
                        <div
                            {{-- class="col-6 col-md-3 col-lg-3" --}}
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementKepanitiaans+= 100 }}"
                        >
                            <div class="card p-3 card-list">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>{{ $kepanitiaan->nama_acara }}</h5>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('portofolio-kepanitiaan-edit', $kepanitiaan->id )}}" class="edit icon">
                                            <img src="/images/pencil-square.svg" alt="" class="w-75" />
                                        </a>
                                        <a href="{{ route('portofolio-kepanitiaan-delete', $kepanitiaan->id )}}" class="delete icon ml-2">
                                            <img src="/images/trash.svg" alt="" class="w-75" />
                                        </a>
                                    </div>
                                </div>
                                {{-- <h6>Deskripsi</h6> --}}
                                <p class="my-0">{!! $kepanitiaan->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Penyelenggara: </h5>
                                            <p class="ml-2">{{ $kepanitiaan->penyelenggara }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Jabatan: </h5>
                                            <p class="ml-2">{{ $kepanitiaan->nama_jabatan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Mulai: </h5>
                                            <p class="ml-2">{{ $kepanitiaan->waktu_mulai }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Lokasi: </h5>
                                            <p class="ml-2">{{ $kepanitiaan->lokasi }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Divisi: </h5>
                                            <p class="ml-2">{{ $kepanitiaan->divisi }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Berakhir: </h5>
                                            <p class="ml-2">{{ $kepanitiaan->waktu_selesai }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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