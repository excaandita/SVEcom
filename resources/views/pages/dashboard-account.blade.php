@extends('layouts.dashboard')

@section('title')
    Dashboard Account-Sekolah Vokasi E-COM
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update yout current profile</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Nama</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="name"
                                  id="name"
                                  value="Exca Muchlis Andita"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">E-mail</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  name="email"
                                  id="email"
                                  value="email@gmail.com"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="addressOne">Alamat 1</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="addressOne"
                                  id="addressOne"
                                  value="Jl. Ir Sutami No.18"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="addressTwo">Alamat 2</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="addressTwo"
                                  id="addressTwo"
                                  value="Jl. Ir Sutami No.26"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="province">Provinsi </label>
                                <select
                                  name="province"
                                  id="province"
                                  class="form-control"
                                >
                                  <option value="Jawa Tengah">
                                    Jawa Tengah
                                  </option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="city">Kota </label>
                                <select
                                  name="city"
                                  id="city"
                                  class="form-control"
                                >
                                  <option value="Surakarta">Surakarta</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="postalCode">Kode POS</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="postalCode"
                                  id="postalCode"
                                  value=" 17562"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="country">Negara</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="country"
                                  id="country"
                                  value="Indonesia"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="mobile">Nomor Telpon</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  name="mobile"
                                  id="mobile"
                                  value="+62 81222221212"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
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

@push('addons-script')
<script>
<<<<<<< Updated upstream
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
=======
  var locations = new Vue({
    el: "#locations",
    mounted() {
      AOS.init();
      this.getProvincesData();
      this.getRegenciesData();
    },
    data: {
      provinces: null,
      regencies: null,
      provinces_id: {{ $user->provinces_id }},
      regencies_id: {{ $user->regencies_id }},
    },
    methods: {
      getProvincesData() {
        var self = this;
        axios.get('{{ route('api-provinces') }}')
          .then(function(response){
              self.provinces = response.data;
          })
      },

      getRegenciesData() {
        var self = this;
        axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
          .then(function(response){
              self.regencies = response.data;
          })
      },
    },
    watch: {
      provinces_id: function(val, oldVal) {
        this.regencies_id = null;
        this.getRegenciesData();
      }
    }

  });
>>>>>>> Stashed changes
</script>
@endpush

@endsection