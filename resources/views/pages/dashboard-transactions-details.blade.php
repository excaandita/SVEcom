@extends('layouts.dashboard')

@section('title')
  Detail Transaksi-Sekolah Vokasi E-COM
@endsection

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
  <div class="container-fluid"> 
    <div class="dashboard-heading">
      <h2 class="dashboard-title">TokoKu D3THP</h2>
      <p class="dashboard-subtitle">Transaksi / Detail</p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4">
                  <img
                    src="/images/product-details-dashboard.png"
                    class="w-100 mb-3"
                    alt=""
                  />
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Pelanggan</div>
                      <div class="product-subtitle">Exca</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Produk</div>
                      <div class="product-subtitle">
                        Makaroni Goreng BBQ
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Tanggal Transaksi
                      </div>
                      <div class="product-subtitle">
                        23 April 2022
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Status Pembayaran</div>
                      <div class="product-subtitle text-danger">
                        PENDING
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Total Harga</div>
                      <div class="product-subtitle">Rp. 10.000</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Telfon</div>
                      <div class="product-subtitle">+62812213913</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-4">
                  <h5>Informasi Pengiriman</h5>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Alamat</div>
                      <div class="product-subtitle">
                        Kost Wisma Yoga
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Alamat Lengkap</div>
                      <div class="product-subtitle">
                        Jl. Ir. Sutami No.18 Jebres
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Kota</div>
                      <div class="product-subtitle">Surakarta</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Provinsi</div>
                      <div class="product-subtitle">Jawa Tengah</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Kode Pos</div>
                      <div class="product-subtitle">15772</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Negara</div>
                      <div class="product-subtitle">Indonesia</div>
                    </div>
                    <div class="col-12 col-md-3">
                      <div class="product-title">Status Pengiriman</div>
                      <select
                        name="status"
                        id="status"
                        class="form-control"
                        v-model="status"
                      >
                        <option value="UNPAID">Unpaid</option>
                        <option value="PENDING">Pending</option>
                        <option value="SHIPPING">Shipping</option>
                        <option value="SUCCESS">Success</option>
                      </select>
                    </div>
                    <template v-if="status == 'SHIPPING'">
                      <div class="col-md-3">
                        <div class="product-title">Input Resi</div>
                        <input
                          type="text"
                          name="resi"
                          v-model="resi"
                          class="form-control"
                        />
                      </div>
                      <div class="col-md-2">
                        <button
                          type="submit"
                          class="btn btn-success btn-block mt-4"
                        >
                          Update Resi
                        </button>
                      </div>
                    </template>
                  </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-12">
                  <button
                    class="btn btn-success btn-block mt-4"
                    type="submit"
                  >
                    Simpan Data
                  </button>
                </div>
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
<script src="/vendor/vue/vue.js"></script>
<script>
  var transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
      status: "SHIPPING",
      resi: "JP00021319823",
    },
  });
</script>
@endpush