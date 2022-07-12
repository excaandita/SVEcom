@extends('layouts.app')

@section('title')
    Portofolio - Sekolah Vokasi E-COM
@endsection

@section('content')
    <div style="margin-top: 80px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>All Portofolios</h5>
                </div>
            </div>
            <div class="row">
                @php $incrementUsers = 0 @endphp
                @forelse ($users as $user)
                    <div
                        class="col-6 col-md-3 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{ $incrementUsers+= 100 }}"
                    >
                        <a href="{{ route('portofolio-detail', $user->id) }}" class="text-decoration-none text-body">
                            <div class="card p-3 card-list">
                                <h6>{{ $user->name }}</h6>
                                <div class="d-flex flex-row justify-content-between">
                                    <p>{{ $user->fakultas }}</p>
                                    <p>{{ $user->angkatan }}</p>
                                </div>
                                @if (Str::length($user->deskripsi) > 100)
                                    <div>{!! Str::substr($user->deskripsi, 0, 100), "..." !!}</div>
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
            </div>
        </div>
    </div>
@endsection