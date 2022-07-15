@extends('layouts.seller')

@section('title')
Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="container-fluid">
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Ringkasan statistik</h2>
                <p class="dashboard-subtitle">Rutin pantau perkembangan toko untuk tingkatkan penjualanmu</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pendapatan</div>
                                <div class="dashboard-card-subtitle">Rp. {{ number_format($pending) }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Baru</div>
                                <div class="dashboard-card-subtitle">Rp. {{ number_format($success)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Aktivitas Hari ini</h2>
                <p class="dashboard-subtitle">Aktivitas yang perlu kamu pantau untuk jaga kepuasan pembeli</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Diproses</div>
                                <div class="dashboard-card-subtitle">{{ $pending }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Dikirim</div>
                                <div class="dashboard-card-subtitle">{{ $success}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Selesai</div>
                                <div class="dashboard-card-subtitle">{{ $done }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-info mb-3">
                            <div class="card-body">
                                <div class="dashboard-card-title">Pesanan Dibatalkan</div>
                                <div class="dashboard-card-subtitle">{{ $canceled }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h3 class="dashboard-title">Recent Transactions</h3>
                <p class="dashboard-subtitle"></p>
            </div>
            <div class="dashboard-content">

                @foreach ($recentlytransaction as $item)
                <ul class="list-group list-group-light">
                    <li class="list-group-item list-group-item-action justify-content-between align-items-center">
                        <div class="row">
                            <div class="col-md-1">
                                {{-- <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt=""
                                    style="width: 70px; height: 70px" class="rounded-circle" /> --}}
                                {{-- <i class="bi bi-person" style="width: 70px; height: 70px"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" width="70px" height="70px" fill="currentColor"
                                    class="bi bi-person" viewBox="0 0 16 16">
                                    <path
                                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                </svg>
                            </div>
                            <div class="col-md-3">
                                <h5 class="fw-bold mb-1">{{ $item->name }}</h5>
                                <small class="text-muted mb-0">{{ $item->email }}</small>
                            </div>
                            <div class="col-md-2">
                                <h5 class="fw-bold mb-1">Admin</h4>
                            </div>
                            <div class="col-md-2">
                                <h5 class="fw-bold mb-1">{{ $item->transaction_status }}</h4>
                            </div>
                            <div class="col-md-4">
                                <h5 class="fw-bold mb-1">{{ $item->updated_at }}</h4>
                            </div>
                        </div>
                    </li>

                </ul>
                @endforeach
            </div>
            <div class="dashboard-heading">
                <h3 class="dashboard-title">Produk Terlaris di Tokomu</h3>
                <p class="dashboard-subtitle"></p>
            </div>
            <div class="dashboard-content">
                <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Etalase</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Terjual</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bestselling as $item)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                                <td>{{ $item->count }}</td>
                                {{-- <td>Rp. 1.600.000</td> --}}
                                {{-- <td>500</td> --}}
                                <td>Aktif</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
