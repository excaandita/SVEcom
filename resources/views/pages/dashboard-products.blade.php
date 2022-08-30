@extends('layouts.app_new')

@section('title')
    Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
  <div class="section">
    <div class="section-header">
      <h1>Produk </h2>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"></div>
        </div>
    </div>
      <div class="dashboard-content">
         <h2 class="section-title">Daftar Produk</h2>
                <p class="section-lead">List daftar produk yang anda miliki</p>
        <div class="row">
          <div class="col-md-12">
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