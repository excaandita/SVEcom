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
            <h2 class="dashboard-title">Admin Dashboard - Sertifikat</h2>
            <p class="dashboard-subtitle">Sekolah Vokasi E-Commerce</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-3" onclick="filter('');">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <div class="dashboard-card-title">Total Sertifikat</div>
                            <div class="dashboard-card-subtitle">{{ $data_sertifikat['total'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" onclick="filter('pending');">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <div class="dashboard-card-title">Request</div>
                            <div class="dashboard-card-subtitle">{{ $data_sertifikat['pending'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" onclick="filter('verified');">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <div class="dashboard-card-title">Approve</div>
                            <div class="dashboard-card-subtitle">{{ $data_sertifikat['approved'] }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3" onclick="filter('rejected');">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <div class="dashboard-card-title">Rejected</div>
                            <div class="dashboard-card-subtitle">{{ $data_sertifikat['rejected'] }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead class="bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>User</th>
                                            <th>Jenis</th>
                                            <th>Lembaga</th>
                                            <th>No Sertifikat</th>
                                            <th>Sertifikat</th>
                                            <th>Status</th>
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
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { "data" : null, "sortable":false,
                render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;}
                },
                { data: 'user.name', name: 'user.name' },
                { data: 'jenis', name: 'jenis' },
                { data: 'lembaga', name: 'lembaga' },
                { data: 'no_sertifikat', name: 'no_sertifikat' },
                // { data: 'path_url_photo', name: 'path_url_photo' },
                { data: 'photo', name: 'photo'},
                {
                    data: 'status',
                    name: 'status',
                    render: function (data, type, row, meta) {
                        if (data == 'rejected') {
                            return data + '<br>Alasan: ' + row.alasan;
                        } else {
                            return data
                        }
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable:false,
                    widht: '15%',
                },
            ]
        })

        function filter(status) {
            datatable.column(6).search(status).draw();
        }
    </script>
@endpush
