@extends('layouts.portofolio')

@section('title')
    Tambah Riwayat Pendidikan Mahasiswa Sekolah Vokasi
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
            id="jenjang"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Riwayat Pendidikan</h2>
                <p class="dashboard-subtitle">
                  Tambahkan Riwayat Pendidikan
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('portofolio-pendidikan-store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Jenjang</label>
                                    <select name="jenjang" v-model="is_jenjang_smp" required id="jenjang" class="form-control">
                                      <option :value="false" value="SMP">SMP</option>
                                      <option :value="true" value="SMA">SMA</option>
                                      <option :value="true" value="KULIAH">KULIAH</option>
                                    </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Nama Sekolah</label>
                                <input type="text" class="form-control" name="nama" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group" v-if="is_jenjang_smp">
                                <label>Jurusan</label>
                                <input 
                                  type="text" 
                                  class="form-control @error('jurusan') is-invalid @enderror" 
                                  id="jurusan" 
                                  name="jurusan"
                                  autocomplete
                                  autofocus/>
                                    @error('jurusan')
                                      <span class="disabled-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Tahun Masuk</label>
                                <input type="number" class="form-control" name="masuk" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>Tahun Keluar</label>
                                <input type="number" class="form-control" name="keluar" />
                              </div>
                            </div>
                           
                            
                          </div>
                          <div class="row">
                            <div class="col">
                              <button
                                type="submit"
                                class="btn btn-info col-md-12"
                              >
                                Simpan
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
  Vue.use(Toasted);

  var jenjang = new Vue({
    el: "#jenjang",
    mounted() {
      AOS.init();
    },
    data() {
      return {
        is_jenjang_smp: true,
        jurusan: "",
      }
    }
  });
</script>
@endpush