@extends('layouts.app')

@section('title')
    Portofolio - Sekolah Vokasi E-COM
@endsection

@section('content')
    <div style="margin-top: 96px">
        <div class="container">
            <form action="{{ url('/search') }}" type="get" class="mt-4">
                <div class="input-group w-100">
                    <span class="input-group-text" id="basic-addon1">
                        <img src="/images/search.svg" alt="">
                    </span>
                    <input name="query" class="form-control" type="search" placeholder="Mau Cari Apa?" aria-describedby="basic-addon1">
                </div>
            </form>

            <div class="row">
                <div class="col-12 mt-4">
                    <h5>All Portofolios</h5>
                </div>
            </div>
            <div class="row">
                @php $incrementUsers = 0 @endphp
                @if (request()->is('search') )  
                    @forelse ($skills as $skill) <!-- dia akan ngeloop sebanyak skill yg dicari -->
                        <div
                            class="col-6 col-md-3 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementUsers+= 100 }}"
                        >
                            <a href="{{ route('portofolio-detail', $skill->users_id) }}" class="text-decoration-none text-body">
                                <div class="card p-3 card-list">
                                    <h6>{{ $skill->name }}</h6>
                                    <div class="d-flex flex-row justify-content-between">
                                        <p>{{ $skill->nama }}</p>
                                        <p>{{ $skill->angkatan }}</p>
                                    </div>
                                    <p>{{ $skill->jenis }}</p>
                                </div>
                            </a>
                        </div>
                    @empty <!-- ketika dia ga nemu search by skill, maka dia akan cari by user -->
                        @forelse ($users as $user)
                            <div
                                class="col-6 col-md-3 col-lg-3"
                                data-aos="fade-up"
                                data-aos-delay="{{ $incrementUsers+= 100 }}"
                            >
                                <a href="{{ route('portofolio-detail', $user->id) }}" class="text-decoration-none text-body">
                                    <div class="card p-3 card-list portfolio">
                                        <h6>{{ $user->name }}</h6>
                                        <div class="d-flex flex-row justify-content-between">
                                            <p>{{ $user->nama }}</p>
                                            <p>{{ $user->angkatan }}</p>
                                        </div>
                                        @if (Str::length($user->deskripsi) > 70)
                                            <div>{!! Str::substr($user->deskripsi, 0, 70), "..." !!}</div>
                                        @else
                                            <div>{!! $user->deskripsi !!}</div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up"
                                data-aos-delay="100">
                                Tidak Ada Portofolio
                            </div>
                        @endforelse
                    @endforelse
                @else
                    @forelse ($users as $user)
                        <div
                            class="col-6 col-md-3 col-lg-3"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementUsers+= 100 }}"
                        >
                            <a href="{{ route('portofolio-detail', $user->id) }}" class="text-decoration-none text-body">
                                <div class="card p-3 card-list portfolio">
                                    <h6>{{ $user->name }}</h6>
                                    <div class="d-flex flex-row justify-content-between">
                                        <p>{{ $user->nama }}</p>
                                        <p>{{ $user->angkatan }}</p>
                                    </div>
                                    @if (Str::length($user->deskripsi) > 70)
                                        <div>{!! Str::substr($user->deskripsi, 0, 70), "..." !!}</div>
                                    @else
                                        <div>{!! $user->deskripsi !!}</div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up"
                            data-aos-delay="100">
                            Tidak Ada Portofolio
                        </div>
                    @endforelse 
                @endif 
            </div>
        </div>
    </div>
@endsection