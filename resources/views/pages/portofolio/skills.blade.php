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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @forelse ($skills as $skill)
                                    <div class="row p-3">
                                        <div class="col-8">
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
                                            <p class="my-0">{{ $skill->lembaga }}</p>
                                            <div class="d-flex">
                                                <p>{{ $skill->tanggal }} - </p>
                                                @if ($skill->tanggal_expired != null)
                                                    <p class="ml-1">{{ $skill->tanggal_expired }}</p>
                                                @else
                                                    <p class="ml-1">Tidak ada Tanggal Expired</p>
                                                @endif
                                            </div>
                                            <p class="my-0">Nomor Sertifikat {{ $skill->no_sertifikat }}</p>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center">
                                            <a class="btn btn-danger px-5 ml-2" href="{{ route('portofolio-skill-delete', $skill->id) }}" role="button">
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