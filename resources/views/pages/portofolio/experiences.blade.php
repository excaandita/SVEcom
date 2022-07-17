@extends('layouts.dashboard')

@section('title')
    Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Pengalaman Kerja</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-experiences-create') }}" role="button">
                        Add Experience
                    </a>
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    @php $incrementExperiences = 0 @endphp
                    @forelse ($experiences as $experience)
                        <div
                            class="col-6 col-md-3 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementExperiences+= 100 }}"
                        >
                            <a href="{{ route('portofolio-experiences-detail', $experience->id) }}" class="text-decoration-none text-body">
                                <div class="card p-3 card-list">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6>{{ $experience->jabatan }}</h6>
                                        <a href="{{ route('portofolio-experiences-delete', $experience->id )}}" class="delete-gallery">
                                            <img src="/images/icon-delete.svg" alt="" />
                                        </a>
                                    </div>
                                    <div class="d-flex flex-row">
                                        <p>{{ $experience->perusahaan }}</p>
                                        @for ($i = 0; $i < count($jabatans); $i++)
                                            @if ($experience->jabatans_id == $jabatans[$i]->id)
                                              <p class="ml-2">{{ $jabatans[$i]->status }}</p>
                                            @endif
                                        @endfor
                                    </div>
                                    @if (Str::length($experience->deskripsi) > 100)
                                        <div>{!! Str::substr($experience->deskripsi, 0, 100), "..." !!}</div>
                                    @else
                                        <div>{!! $experience->deskripsi !!}</div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada experience
                        </div>
                    @endforelse
                </div>
            </div>
            </div>
          </div>
@endsection