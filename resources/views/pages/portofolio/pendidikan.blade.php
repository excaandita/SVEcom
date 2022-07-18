@extends('layouts.dashboard')

@section('title')
    Pendidikan Mahasiswa Sekolah Vokasi
@endsection

@section('content')
    <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
    >
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Pendidikan</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-pendidikan-create') }}" role="button">
                        Add
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="">
                    @php
                        $incrementPendidikans = 0
                    @endphp
                    @forelse ($pendidikans as $pendidikan)
                        <div
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementPendidikans+= 100 }}"
                        >
                            <div class="card p-3 card-list">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5>{{ $pendidikan->nama }}</h5>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('portofolio-pendidikan-edit', $pendidikan->id )}}" class="edit icon">
                                            <img src="/images/pencil-square.svg" alt="" class="w-75" />
                                        </a>
                                        <a href="{{ route('portofolio-pendidikan-delete', $pendidikan->id )}}" class="delete icon ml-2">
                                            <img src="/images/trash.svg" alt="" class="w-75" />
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Jenjang: </h5>
                                            <p class="ml-2">{{ $pendidikan->jenjang }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Tahun Mulai: </h5>
                                            <p class="ml-2">{{ $pendidikan->masuk }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Jurusan: </h5>
                                            <p class="ml-2">{{ $pendidikan->jurusan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Tahun Berakhir: </h5>
                                            <p class="ml-2">{{ $pendidikan->keluar }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada Pendidikan
                        </div>
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
@endsection