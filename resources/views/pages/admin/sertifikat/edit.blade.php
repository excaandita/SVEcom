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
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('sertifikat.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                
                                                            
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <!-- <select name="status" required id="status" class="custom-control-input"> --> 
                                                <!-- <option value="{{ $item->status }}" selected>Tidak Berubah ({{
                                                    $item->status }})</option> --> 

                                    <!-- <div class="status">Status</div> -->


                                    
                                    <div class="status">
                                      <input type="radio" id="verified" name="status" value="verified" />
                                      <label for="verified" title="text">Verified</label>
                                      <input type="radio" id="rejected" name="status" value="rejected" />
                                      <label for="rejected" title="text">Reject</label>
                                      <input type="radio" id="pending" name="status" value="pending" />
                                      <label for="pending" title="pending">Pending</label>
                                    </div>
                                  </div>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <img src="{{ Storage::url($item->path_url_photo ?? '') }}" alt=""
                                            class="img img-fluid"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success mt-3 px-5">
                                            Simpan
                                        </button>
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