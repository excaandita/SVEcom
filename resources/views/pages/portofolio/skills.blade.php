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
                <h2 class="dashboard-title">Skills</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-skill-create') }}" role="button">
                        Add Skill
                    </a>
                </p>
            </div>
            <div class="dashboard-content">
                <div class="">
                    @php
                        $incrementSkills = 0
                    @endphp
                    @forelse ($skills as $skill) 
                        <div
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementSkills+= 100 }}"
                        >
                            <div class="card p-3 card-list">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <h5 class="my-0">{{ $skill->jenis }}</h5>
                                        @if ($skill->status == "verified")
                                            <div class="badge rounded-pill bg-success text-white ml-2">Verified</div>
                                        @elseif ($skill->status == "pending")
                                            <div class="badge rounded-pill bg-warning text-white ml-2">Pending</div>
                                        @elseif ($skill->status == "rejected")
                                            <div class="badge rounded-pill bg-danger text-white ml-2">Rejected</div>
                                        @endif
                                    </div>
                                    <a href="{{ route('portofolio-skill-delete', $skill->id )}}" class="delete icon">
                                        <img src="/images/trash.svg" alt="" class="w-75" />
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Lembaga yang mengeluarkan: </h5>
                                            <p class="ml-2">{{ $skill->lembaga }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Tanggal Sertifikasi: </h5>
                                            <p class="ml-2">{{ $skill->tanggal }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Nomor Sertifikat: </h5>
                                            <p class="ml-2">{{ $skill->no_sertifikat }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Tanggal Expired: </h5>
                                            @if ($skill->tanggal_expired != null)
                                                <p class="ml-2">{{ $skill->tanggal_expired }}</p>
                                            @else
                                                <p class="ml-2">Tidak ada Tanggal Expired</p>
                                            @endif
                                        </div>
                                        <div class="card-body skill-image">
                                        <img
                                            src="{{ Storage::url($skill->galleries->first()->photos ?? '') }}"
                                            alt=""
                                            class="w-100 mb-2 "
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada Skills
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection