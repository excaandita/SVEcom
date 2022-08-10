@extends('layouts.app')

@section('title')
   Produk - Sekolah Vokasi E-COM
@endsection
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Produk</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
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
                    style="
                        background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                    "
                  ></div>
                 </div>
                  
                  <div class="product__item__text">
                    <h6>{{ $product->name }}</h6>
                    <a href="{{ route('detailproduk', $product->slug)}}" class="add-cart">Detail Produk</a>
                   
                    <h5>Rp. {{number_format($product->price) }}</h5>
                  </div>
                </div>
              </div>
            @empty
              <div class="col-12 text-center py-5" data-aos="fade-up"
                  data-aos-delay="100">
                  Tidak ada produk
              </div>
           @endforelse
           
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="product__pagination">
                  {{ $products->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Shop Section End -->
    @endsection