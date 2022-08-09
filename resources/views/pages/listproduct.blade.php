@extends('layouts.app1')

@section('title')
<<<<<<< Updated upstream
    Kategori - Sekolah Vokasi E-COM
=======
   Produk - Sekolah Vokasi E-COM
>>>>>>> Stashed changes
@endsection

@section('content')
<div class="page-content page-home" style="margin-top: 80px">
  
  <section class="store-new-products">
    <div class="container-fluid" data-aos="fade-up">
        <div class="row">
            <div class="col-md-8 offset-md-2 mb-3">
              <h2 class="text-center display-4">PRODUK</h2> 
              <form action="{{ route('listproduct') }}" method="GET">
                <div class="input-group">
                  <input type="search" name="search" value="{{ request()->get('search') }}" class="form-control form-control-lg" placeholder="Cari Produk Pilihanmu">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-lg btn-info">
                    Search
                    </button>
                    </div>
                </div>
              </form>
            </div>
<<<<<<< Updated upstream
        </div>
        <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>Semua Produk</h5>
        </div>
      </div>
      <div class="row">
      <!-- batas new Product-->
        @php $incrementProduct = 0 @endphp
          @forelse ($products as $product )
            <div
            class="col-4 col-md-4 col-lg-3 mt-3"
            data-aos="fade-up"
            data-aos-delay="{{ $incrementProduct+= 100 }}"
            >
              <a href="{{ route('detail', $product->slug)}}" class="component-products d-block">
                <div class="products-thumbnail">
                  <div
                    class="products-image"
=======
          </div>
          <div class="col-lg-9">
            <div class="shop__product__option">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="shop__product__option__left">
                     
                    <p>Showing 1–9 of {{ $products->count()}}</p>
                    
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="shop__product__option__right">
                    <p>Sort by Price:</p>
                    <select>
                      <option value="">Low To High</option>
                      <option value="">$0 - $55</option>
                      <option value="">$55 - $100</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
                @forelse ($products as $product )
              <div class="col-lg-4 col-md-4 col-sm-6" data-aos="fade-up">
               <div class="product__item">
                 <div class="image-content-list">
                   <div
                    class="product__item__pic"
>>>>>>> Stashed changes
                    style="
                      @if($product->galleries->count())
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                      @else
                        background-color: #17A2B8
                      @endif
                    "
                  ></div>
                </div>
                <div class="products-text">{{ $product->name }}</div>
                <div class="products-price">Rp. {{number_format($product->price) }}</div>
              </a>
            </div>
          @empty
            <div class="col-12 text-center py-5" data-aos="fade-up"
            data-aos-delay="100">
              Tidak ada produk
            </div>
          @endforelse
      <!-- batas new Product-->
      </div>
    </div>
  </section>
</div>
@endsection