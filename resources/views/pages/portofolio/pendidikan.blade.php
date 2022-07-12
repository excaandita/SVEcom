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
                        Add Pendidikan
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @php $incrementPendidikans = 0 @endphp
                                    @forelse ($pendidikans as $pendidikan)
                                        <div class="row p-3">
                                            <div class="col-8">
                                                <h5 class="my-0">{{ $pendidikan->nama }}</h5>
                                                <div class="d-flex my-0">
                                                    <p class="my-0">{{ $pendidikan->jenjang }},</p>
                                                    <p class="ml-2 my-0">{{ $pendidikan->jurusan }}</p>
                                                </div>
                                                <div class="d-flex">
                                                    <p>{{ $pendidikan->masuk }} - </p>
                                                    <p class="ml-1">{{ $pendidikan->keluar }}</p>
                                                </div>
                                            </div>
                                            <div class="col-4 d-flex align-items-center justify-content-center">
                                                <a class="btn btn-info px-5" href="{{ route('portofolio-pendidikan-create') }}" role="button">
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger px-5 ml-2" href="{{ route('portofolio-pendidikan-create') }}" role="button">
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                        <hr class=my-0>
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
            </div>
        </div>
    </div>
@endsection