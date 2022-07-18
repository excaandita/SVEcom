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
                <h2 class="dashboard-title">Experiences</h2>
                <p class="dashboard-subtitle">
                    <a class="btn btn-info px-5" href="{{ route('portofolio-experiences-create') }}" role="button">
                        Add
                    </a>
                </p>
              </div>
              <div class="dashboard-content">
                <div class="">
                    @php $incrementExperiences = 0 @endphp
                    @forelse ($experiences as $experience)
                        <div
                            {{-- class="col-6 col-md-3 col-lg-3" --}}
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementExperiences+= 100 }}"
                        >
                            <div class="card p-3 card-list">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div>
                                        <h5 class="my-0">{{ $experience->jabatan }}</h5>
                                        <div class="d-flex flex-row my-0">
                                            <p class="my-0">{{ $experience->perusahaan }}</p>
                                            @for ($i = 0; $i < count($jabatans); $i++)
                                                @if ($experience->jabatans_id == $jabatans[$i]->id)
                                                    <p class="ml-2 my-0">{{ $jabatans[$i]->status }}</p>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('portofolio-experiences-edit', $experience->id )}}" class="edit icon">
                                            <img src="/images/pencil-square.svg" alt="" class="w-75" />
                                        </a>
                                        <a href="{{ route('portofolio-experiences-delete', $experience->id )}}" class="delete icon ml-2">
                                            <img src="/images/trash.svg" alt="" class="w-75" />
                                        </a>
                                    </div>
                                </div>
                                <p class="my-0">{!! $experience->deskripsi !!}</p>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Lokasi: </h5>
                                            <p class="ml-2">{{ $experience->lokasi_perusahaan }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Mulai: </h5>
                                            <p class="ml-2">{{ $experience->waktu_mulai }}</p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex">
                                            <h5>Bidang: </h5>
                                            <p class="ml-2">{{ $experience->bidang }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <h5>Waktu Berakhir: </h5>
                                            <p class="ml-2">{{ $experience->waktu_selesai }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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