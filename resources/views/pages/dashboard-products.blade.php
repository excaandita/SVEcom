@extends('layouts.dashboard')

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
                <h2 class="dashboard-title">My Products</h2>
                <p class="dashboard-subtitle">Manage your products</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <a
                      href="/dashboard-products-create.html"
                      class="btn btn-success"
                      >Tambah produkmu</a
                    >
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a
                      href="{{url('dashboard/products/1')}}"
                      class="card card-dashboard-product d-block"
                    >
                      <div class="card-body">
                        <img
                          src="/images/product-card-1.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title">Boba Jaksel</div>
                        <div class="product-category">Minuman</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a
                      href="/dashboard-products-details.html"
                      class="card card-dashboard-product d-block"
                    >
                      <div class="card-body">
                        <img
                          src="/images/product-card-2.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title">Makaroni Goreng BBQ</div>
                        <div class="product-category">Makanan</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a
                      href="/dashboard-products-details.html"
                      class="card card-dashboard-product d-block"
                    >
                      <div class="card-body">
                        <img
                          src="/images/product-card-3.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title">Telur Asin</div>
                        <div class="product-category">Makanan</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a
                      href="/dashboard-products-details.html"
                      class="card card-dashboard-product d-block"
                    >
                      <div class="card-body">
                        <img
                          src="/images/product-card-4.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title">Mesin Bubut</div>
                        <div class="product-category">Alat Produksi</div>
                      </div>
                    </a>
                  </div>
                  <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a
                      href="/dashboard-products-details.html"
                      class="card card-dashboard-product d-block"
                    >
                      <div class="card-body">
                        <img
                          src="/images/product-card-5.png"
                          alt=""
                          class="w-100 mb-2"
                        />
                        <div class="product-title">Mesin Selep Padi</div>
                        <div class="product-category">Alat Pertanian</div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection