@extends('layouts.app_new')

@section('title')
    Dashboard-Sekolah Vokasi E-COM
@endsection

@section('content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Produk</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Produk</a></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Produk</h2>
      <a
      href="{{ route('dashboard-product-create')}}"
      class="btn btn-info"
      >Tambah produkmu</a
    >
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
  </section>
</div>

@endsection