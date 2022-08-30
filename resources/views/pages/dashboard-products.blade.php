@extends('layouts.app_new')

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
                <h2 class="dashboard-title">Produk </h2>
                <p class="dashboard-subtitle">Kelola Produk Anda</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a
                      href="{{ route('dashboard-product-create')}}"
                      class="btn btn-info"
                      >Tambah produkmu</a
                    >
                  </div>
                </div>
                <div class="row mt-4">
                  <!-- data product -->
                  @foreach ($products as $p)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                      <a
                        href="{{ route('dashboard-product-details', $p->id )}}"
                        class="card card-dashboard-product d-block"
                      >
                      
                      
                      <div class="card-body">
                         
                           <img
                            src="{{ Storage::url($p->galleries->first()->photos ?? '') }}"
                            alt=""
                            class="mb-2 image-box"
                          />
                          <div class="product-title">{{ $p->name }}</div>
                          <div class="product-category">{{ $p->category->name }}</div>
                           <div class="product-category">Terjual {{ ($p->transactiondetail->sum('quantity')) }} pcs</div>
                           
                        </div>
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
@endsection