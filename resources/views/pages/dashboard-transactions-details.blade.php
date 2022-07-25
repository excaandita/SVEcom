@extends('layouts.dashboard')

@section('title')
  Detail Transaksi-Sekolah Vokasi E-COM
@endsection

@push('addon-style')
<style>
.rate {
  float: left;
  height: 46px;
  padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}
</style>
    
@endpush

@section('content')
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
  <div class="container-fluid"> 
    <div class="dashboard-heading">
      <h2 class="dashboard-title">{{ $transaction->code }}</h2>
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
                    src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '')}}"
                    class="w-100 mb-3"
                    alt=""
                  />
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Pelanggan</div>
                      <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Produk</div>
                      <div class="product-subtitle">
                        {{ $transaction->product->name}}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Tanggal Transaksi
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->created_at }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Status Pembayaran</div>
                      <div class="product-subtitle text-danger">
                        {{ $transaction->transaction->transaction_status}}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Total Harga</div>
                      <div class="product-subtitle">Rp. {{ number_format($transaction->transaction->total_price)}}</div>
                    </div>
                     <div class="col-12 col-md-6">
                      <div class="product-title">Jumlah Barang</div>
                      <div class="product-subtitle"> {{$transaction->quantity}}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Telfon</div>
                      <div class="product-subtitle">{{ $transaction->transaction->user->phone_number }}</div>
                    </div>
                  </div>
                </div>
              </div>
              <form action="{{ route('dashboard-transaction-update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 mt-4">
                    <h5>Informasi Pengiriman</h5>
                  </div>
                  <div class="col-12">
                    <div class="row">
                      <div class="col-12 col-md-6">
                        <div class="product-title">Alamat</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_one }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Alamat Lengkap</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_one }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Kota</div>
                        <div class="product-subtitle">{{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Provinsi</div>
                        <div class="product-subtitle">{{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Kode Pos</div>
                        <div class="product-subtitle">{{ $transaction->transaction->user->zip_code }}</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Negara</div>
                        <div class="product-subtitle">{{ $transaction->transaction->user->country }}</div>
                      </div>

                      @if (auth()->user()->roles == 'BUYER')
                        <div class="col-12 col-md-3">
                          <div class="product-title">Status Pengiriman</div>
                          <input
                              type="text"
                              name="shipping_status"
                              v-model="status"
                              class="form-control"
                              disabled
                            />
                        </div>
                        <template v-if="status == 'SHIPPING'">
                          <div class="col-md-3">
                            <div class="product-title">Resi</div>
                            <input
                              type="text"
                              name="resi"
                              v-model="resi"
                              class="form-control"
                              disabled
                            />
                          </div>
                          <div class="col-md-3">
                            <form action="{{ route('dashboard-transaction-update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="hidden" value="SUCCESS" name="shipping_status">
                              <button
                                class="btn btn-success btn-block mt-4"
                                type="submit"
                              >
                              Barang Diterima
                              </button>
                            </form>
                          </div>
                        </template>
                    </div>
                        <template v-if="status == 'SUCCESS'">
                          <form action="{{ route('dashboard-transaction-update', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                              <div class="col-12 mt-3">
                                <div class="row">
                                  <!-- Rating Star -->
                                  <div class="col-md-6">
                                    <div class="product-title">Rating produk</div>
                                    <div class="rate">
                                      <input type="radio" id="star5" name="rating" value="5" />
                                      <label for="star5" title="text">5 stars</label>
                                      <input type="radio" id="star4" name="rating" value="4" />
                                      <label for="star4" title="text">4 stars</label>
                                      <input type="radio" id="star3" name="rating" value="3" />
                                      <label for="star3" title="text">3 stars</label>
                                      <input type="radio" id="star2" name="rating" value="2" />
                                      <label for="star2" title="text">2 stars</label>
                                      <input type="radio" id="star1" name="rating" value="1" />
                                      <label for="star1" title="text">1 star</label>
                                    </div>
                                  </div>
                                  <!-- kolom komentar -->
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <div class="product-title">Kolom Komentar</div>
                                      <textarea name="komentar" id="editor"></textarea>
                                    </div>
                                  </div>
                                  </div>
                                  <!-- tombol Submit Komen rating-->
                                  <div class="row justify-content-center">
                                    <div class="col-md-4">
                                    <button
                                      class="btn btn-success btn-block mt-4"
                                      type="submit"
                                    >
                                      Beri Komentar!!!
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </template>

                        <template v-if="status == 'PENDING'">
                          <div class="col-md-3">
                            <form action="{{ route('dashboard-refund-create', $transaction->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <button
                                class="btn btn-success btn-block mt-4"
                                type="submit"
                              >
                              REFUND
                              </button>
                            </form>
                          </div>
                        </template>
                      @endif

                      @if (auth()->user()->roles == 'USER')
                      <div class="col-12 col-md-3">
                        <div class="product-title">Status Pengiriman</div>
                        <select
                          name="shipping_status"
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
                      @endif
                        
                      
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
<script src="/vendor/vue/vue.js"></script>
<script>
  var transactionDetails = new Vue({
    el: "#transactionDetails",
    data: {
      status: "{{ $transaction->shipping_status}}",
      resi: "{{ $transaction->resi }}",
    },
  });
</script>
@endpush

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector("#editor"))
        .then((editor) => {
            console.log(editor);
        })
        .catch((error) => {
            console.error(error);
        });
</script>
<script>
    ckeditor.replace("editor");
</script>
@endpush