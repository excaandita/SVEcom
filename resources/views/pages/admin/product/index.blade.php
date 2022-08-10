@extends('layouts.admin')

@section('title')
    Produk- Marketplace Sekolah Vokasi 
@endsection

@section('content')

<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Admin Dashboard - Product</h2>
            <p class="dashboard-subtitle"> Marketplace Sekolah Vokasi </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('product.create')}}" class="btn btn-dark mb-3">
                                Tambah Produk
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="tabelproduk">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>User</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                            <th>Terjual</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--nambahin script -->
@push('addon-script')
    <script>
        var datatable = $('#tabelproduk').DataTable({ //manggil data tablenya(var datatable adalah nama variablenya)
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}', //Panggil url untuk data table makanya pake ajax, dikasi url dari halaman itu sendiri
            },
            columns: [ //buat columnya bagian name itu disesuaikan dgn nama ditabel
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'user.name', name: 'user.name' }, //buat akses relasi
                { data: 'category.name', name: 'category.name' },
                { data: 'price', name: 'price' },
                { data: 'stock', name: 'stock' },
                { data: 'transactiondetail_sum_quantity', name: 'transactiondetail_sum_quantity', orderable: false, //fungsinya supaya field action gabisa disortir
                    searchable:false, },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false, //fungsinya supaya field action gabisa disortir
                    searchable:false,
                    widht: '15%',
                },
            ]
        })
    </script>
@endpush
