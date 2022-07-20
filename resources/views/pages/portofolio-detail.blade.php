@extends('layouts.app')

@section('title')
    Portofolio - Sekolah Vokasi E-COM
@endsection

@section('content')
    <div style="margin-top: 80px">
        <div class="container"><h2>Portofolio {{ $user->name }}</h2></div>
            <div class="container tabs mt-4">	
                <ul class="nav nav-pills">
                    <li class="active">
                        <a href="#biodata" data-toggle="tab">Biodata</a>
                    </li>
                    <li>
                        <a href="#kepanitiaan" data-toggle="tab">Kepanitiaan</a>
                    </li>
                    <li>
                        <a href="#organisasi" data-toggle="tab">Organisasi</a>
                    </li>
                    <li>
                        <a href="#pendidikan" data-toggle="tab">Pendidikan</a>
                    </li>
                    <li>
                        <a href="#experience" data-toggle="tab">Experience</a>
                    </li>
                    <li>
                        <a href="#project" data-toggle="tab">Project</a>
                    </li>
                    <li>
                        <a href="#skills" data-toggle="tab">Skills</a>
                    </li>
                </ul>

                <div class="tab-content color clearfix">
                    <div class="tab-pane active" id="biodata">
                        <div class="row mt-2">
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
                                <h6>Deskripsi</h6>
                                <p>{!! $user->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        @guest
                                            <div class="d-flex">
                                                <h6>Fakultas: </h6>
                                                <p class="ml-2">{{ $user->fakultas }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <h6>Angkatan: </h6>
                                                <p class="ml-2">{{ $user->angkatan }}</p>
                                            </div>
                                        @endguest
                                        @auth
                                            <div class="d-flex">
                                                <h6>Tempat Lahir: </h6>
                                                <p class="ml-2">{{ $user->tempat_lahir }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <h6>Tanggal Lahir: </h6>
                                                <p class="ml-2">{{ $user->tanggal_lahir }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <h6>Alamat KTP: </h6>
                                                <p class="ml-2">{{ $user->address_one }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <h6>Angkatan: </h6>
                                                <p class="ml-2">{{ $user->angkatan }}</p>
                                            </div>
                                        @endauth
                                    </div>
                                    <div class="col-6">
                                        @guest
                                            <div class="d-flex">
                                                <h6>Program Studi: </h6>
                                                @if ($prodi == null)
                                                    <p class="ml-2">Belum ada Program Studi</p>
                                                @else
                                                    <p class="ml-2">{{ $prodi->nama }}</p>
                                                @endif
                                            </div>
                                            <div class="d-flex">
                                                <h6>NIM: </h6>
                                                <p class="ml-2">{{ $user->nim }}</p>
                                            </div>
                                        @endguest
                                        @auth
                                            <div class="d-flex">
                                                <h6>Fakultas: </h6>
                                                <p class="ml-2">{{ $user->fakultas }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <h6>Program Studi: </h6>
                                                @if ($prodi == null)
                                                    <p class="ml-2">Belum ada Program Studi</p>
                                                @else
                                                    <p class="ml-2">{{ $prodi->nama }}</p>
                                                @endif
                                            </div>
                                            <div class="d-flex">
                                                <h6>Alamat Solo: </h6>
                                                <p class="ml-2">{{ $user->alamat_solo }}</p>
                                            </div>
                                            <div class="d-flex">
                                                <h6>NIM: </h6>
                                                <p class="ml-2">{{ $user->nim }}</p>
                                            </div>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="kepanitiaan">
                        <div class="row mt-2">
                            <div class="col-12">
                                @php $incrementKepanitiaans = 0 @endphp
                                @forelse ($kepanitiaans as $kepanitiaan)
                                    <div
                                        class="mb-3"
                                        data-aos="fade-up"
                                        data-aos-delay="{{ $incrementKepanitiaans+= 100 }}"
                                    >
                                        <h5 class="my-0">{{ $kepanitiaan->nama_acara }}</h5>
                                        <p class="my-0">{{ $kepanitiaan->nama_jabatan }} {{ $kepanitiaan->divisi }}</p>
                                        <p class="my-0">{{ $kepanitiaan->penyelenggara }} · {{ $kepanitiaan->lokasi }}</p>
                                        @php
                                            $start = new DateTime($kepanitiaan->waktu_mulai);
                                            $end = new DateTime($kepanitiaan->waktu_selesai);
                                            $diff = $start->diff($end);
                                            $yearsInMonths = $diff->format('%r%y') * 12;
                                            $months = $diff->format('%r%m');
                                            $totalMonths = $yearsInMonths + $months;
                                        @endphp
                                        <p >{{ date('d M Y', strtotime($kepanitiaan->waktu_mulai))  }} - {{ date('d M Y', strtotime($kepanitiaan->waktu_selesai)) }} · {{ $totalMonths }} Bulan</p>
                                        <div class="post">
                                            @if (Str::length($kepanitiaan->deskripsi) > 100)
                                                {!! substr($kepanitiaan->deskripsi, 0, 100) !!}
                                                <span id="dots" class="dots">...</span>
                                                <span id="more" class="more">{{ substr($kepanitiaan->deskripsi, 100)  }}</span>
                                                <button id="myBtn" class="myBtn">Read more</button>
                                            @else
                                                <p>{!! $kepanitiaan->deskripsi !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="border border-2">
                                @empty
                                    <div class="col-12 text-center py-5" data-aos="fade-up"
                                        data-aos-delay="100">
                                        Tidak Ada Kepanitiaan
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="organisasi">
                        <div class="row mt-2">
                            <div class="col-12">
                                @php $incrementOrganisasis = 0 @endphp
                                @forelse ($organisasis as $organisasi)
                                    <div
                                        class="mb-3"
                                        data-aos="fade-up"
                                        data-aos-delay="{{ $incrementOrganisasis+= 100 }}"
                                    >
                                        <h5 class="my-0">{{ $organisasi->jabatan }} {{ $organisasi->divisi }}</h5>
                                        <p class="my-0">{{ $organisasi->nama }}</p>
                                        @php
                                            $start = new DateTime($organisasi->waktu_mulai);
                                            $end = new DateTime($organisasi->waktu_selesai);
                                            $diff = $start->diff($end);
                                            $yearsInMonths = $diff->format('%r%y') * 12;
                                            $months = $diff->format('%r%m');
                                            $totalMonths = $yearsInMonths + $months;
                                        @endphp
                                        <p class="my-0">{{ date('d M Y', strtotime($organisasi->waktu_mulai))  }} - {{ date('d M Y', strtotime($organisasi->waktu_selesai)) }} · {{ $totalMonths }} Bulan</p>
                                        <div class="post">
                                            @if (Str::length($organisasi->deskripsi) > 100)
                                                {!! substr($organisasi->deskripsi, 0, 100) !!}
                                                <span id="dots" class="dots">...</span>
                                                <span id="more" class="more">{{ substr($organisasi->deskripsi, 100)  }}</span>
                                                <button id="myBtn" class="myBtn">Read more</button>
                                            @else
                                                <p>{!! $organisasi->deskripsi !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="border border-2">
                                @empty
                                    <div class="col-12 text-center py-5" data-aos="fade-up"
                                        data-aos-delay="100">
                                        Tidak Ada Organisasi
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pendidikan">
                        <div class="row mt-2">
                            <div class="col-12">
                                @php $incrementPendidikans = 0 @endphp
                                @forelse ($pendidikans as $pendidikan)
                                    <div
                                        class="mb-3"
                                        data-aos="fade-up"
                                        data-aos-delay="{{ $incrementPendidikans+= 100 }}"
                                    >
                                        <h5 class="my-0">{{ $pendidikan->nama }}</h5>
                                        <p class="my-0">{{ $pendidikan->jenjang }} · {{ $pendidikan->jurusan }}</p>
                                        <p class="my-0">{{ $pendidikan->masuk  }} - {{ $pendidikan->keluar }}</p>
                                    </div>
                                    <hr class="border border-2">
                                @empty
                                    <div class="col-12 text-center py-5" data-aos="fade-up"
                                        data-aos-delay="100">
                                        Tidak Ada Pendidikan
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="experience">
                        <div class="row mt-2">
                            <div class="col-12">
                                @php
                                    $incrementExperiences = 0
                                @endphp
                                @forelse ($experiences as $experience)
                                    <div
                                    class="mb-3"
                                        data-aos="fade-up"
                                        data-aos-delay="{{ $incrementExperiences+= 100 }}"
                                    >
                                        <h5 class="my-0">{{ $experience->jabatan }}</h5>
                                        <p class="my-0">{{ $experience->perusahaan }} · {{ $experience->lokasi_perusahaan }} · {{ $experience->bidang }}</p>
                                        @php
                                            $start = new DateTime($experience->waktu_mulai);
                                            $end = new DateTime($experience->waktu_selesai);
                                            $diff = $start->diff($end);
                                            $yearsInMonths = $diff->format('%r%y') * 12;
                                            $months = $diff->format('%r%m');
                                            $totalMonths = $yearsInMonths + $months;
                                        @endphp
                                        <p class="my-0">{{ date('d M Y', strtotime($experience->waktu_mulai))  }} - {{ date('d M Y', strtotime($experience->waktu_selesai)) }} · {{ $totalMonths }} Bulan</p>
                                        <div class="post">
                                            @if (Str::length($experience->deskripsi) > 100)
                                                {!! substr($experience->deskripsi, 0, 100) !!}
                                                <span id="dots" class="dots">...</span>
                                                <span id="more" class="more">{{ substr($experience->deskripsi, 100)  }}</span>
                                                <button id="myBtn" class="myBtn">Read more</button>
                                            @else
                                                <p>{!! $experience->deskripsi !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="border border-2">
                                @empty
                                    <div class="col-12 text-center py-5" data-aos="fade-up"
                                        data-aos-delay="100">
                                        Tidak Ada Experience
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="project">
                        <div class="row mt-2">
                            <div class="col-12">
                                @php $incrementProjects = 0 @endphp
                                @forelse ($projects as $project)
                                    <div
                                    class="mb-3"
                                        data-aos="fade-up"
                                        data-aos-delay="{{ $incrementProjects+= 100 }}"
                                    >
                                        <div class="d-flex align-items-center">
                                            <h5 class="my-0">{{ $project->judul }}</h5>
                                            @if ($project->status == "selesai")
                                                <div class="badge rounded-pill bg-success p-2 text-white ml-2">Selesai</div>
                                            @elseif ($project->status == "proses")
                                                <div class="badge rounded-pill bg-info p-2 text-white ml-2">Proses</div>
                                            @endif
                                        </div>
                                        @php
                                            $start = new DateTime($project->tanggal_mulai);
                                            $end = new DateTime($project->tanggal_selesai);
                                            $diff = $start->diff($end);
                                            $yearsInMonths = $diff->format('%r%y') * 12;
                                            $months = $diff->format('%r%m');
                                            $totalMonths = $yearsInMonths + $months;
                                        @endphp
                                        <p class="my-0">{{ date('d M Y', strtotime($project->tanggal_mulai))  }} - {{ date('d M Y', strtotime($project->tanggal_selesai)) }} · {{ $totalMonths }} Bulan</p>
                                        <div class="post">
                                            @if (Str::length($project->deskripsi) > 100)
                                                {!! substr($project->deskripsi, 0, 100) !!}
                                                <span id="dots" class="dots">...</span>
                                                <span id="more" class="more">{{ substr($project->deskripsi, 100)  }}</span>
                                                <button id="myBtn" class="myBtn">Read more</button>
                                            @else
                                                <p>{!! $project->deskripsi !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <hr class="border border-2">
                                @empty
                                    <div class="col-12 text-center py-5" data-aos="fade-up"
                                        data-aos-delay="100">
                                        Tidak Ada Project
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="skills">
                        <div class="row mt-2">
                            <div class="col-12">
                                @php $incrementSkills = 0 @endphp
                                @forelse ($skills as $skill)
                                    <div
                                    class="mb-3"
                                        data-aos="fade-up"
                                        data-aos-delay="{{ $incrementSkills+= 100 }}"
                                    >
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
                                    <hr class="border border-2">
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
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".myBtn").click(function() {
                $(this).prev().toggle();
                $(this).siblings('.dots').toggle();
                if($(this).text() === "Read more") {
                    $(this).text("Read less");
                }
                else {
                    $(this).text("Read more");
                }
            });
        });
    </script>
@endsection