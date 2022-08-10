@extends('layouts.admin')

@section('title')
    Sertifikat-Sekolah Vokasi E-COM
@endsection

@section('content')

    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Admin Dashboard - Sertifikat</h2>
                <p class="dashboard-subtitle">Edit Sertifikat</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card">
                            <form action="{{ route('sertifikat.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="d-block">Status</label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="verified"
                                                        name="status" value="verified">
                                                    <label class="form-check-label" for="verified">Verified</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="rejected"
                                                        name="status" value="rejected">
                                                    <label class="form-check-label" for="rejected">Reject</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" id="pending"
                                                        name="status" value="pending">
                                                    <label class="form-check-label" for="pending">Pending</label>
                                                </div>
                                            </div>
                                            <div class="form-group mb-3" id="form-alasan">
                                                <label for="">Alasan Penolakan</label>
                                                <textarea class="form-control" name="alasan" id="alasan" cols="30" rows="5">{{ old('alasan', $item->alasan) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <img src="{{ Storage::url($item->path_url_photo ?? '') }}" alt=""
                                                class="img img-fluid" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success mt-3 px-5">
                                                Simpan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
        $('.form-check-input').on('change', function() {
            if($('#rejected').is(':checked')) {
                $('#form-alasan').show();
            } else {
                $('#form-alasan').hide();
            }
        });
        $(document).ready(function () {
            $('input:radio[name="status"][value="{{ old('status', $item->status) }}"]').attr('checked',true).trigger('change');
        });
    </script>
@endpush
