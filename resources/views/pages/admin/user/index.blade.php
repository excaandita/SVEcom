@extends('layouts.admin')

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
            <h2 class="dashboard-title">Admin Dashboard - User</h2>
            <p class="dashboard-subtitle">Sekolah Vokasi E-Commerce</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('user.create')}}" class="btn btn-info mb-3">
                                Tambah User
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="tabeluser">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Roles</th>
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

@push('addon-script')
    <script>
        var datatable = $('#tabeluser').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}', //Panggil url untuk data table makanya pake ajax, dikasi url dari halaman itu sendiri
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'roles', name: 'roles' },
<<<<<<< Updated upstream
=======
                { data: 'suspend', name: 'suspend',orderable: false,
                    searchable:false, },
>>>>>>> Stashed changes
                { 
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable:false,
                    widht: '15%',
                },
            ]
        })
    </script>
@endpush