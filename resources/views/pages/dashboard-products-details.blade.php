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
      <h2 class="section-title">{{  $product->name   }}</h2>
      <p class="section-lead">Detail Produk</p>
 
      @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <div class="row">

    @foreach ($product->galleries as $gallery)
      <div class="col-md-3 mx-3">
        <div class="gallery-container">
          <img
            src="{{ Storage::url($gallery->photos ?? '') }}"
            alt=""
            class="image-box"
          />
          <a href="{{ route('dashboard-product-gallery-delete', $gallery->id )}}" class="delete-gallery">
            <img src="/images/icon-delete.svg" alt="" />
          </a>
        </div>
      </div>
    @endforeach

    <div class="col-12">
      <form action="{{ route('dashboard-product-gallery-upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="products_id" value="{{ $product->id }}">
        <!--onchange="form.submit() kalo ngeklik photonya lgsg ke save"-->
        <input
          type="file"
          id="file"
          name="photos"
          style="display: none"
          onchange="form.submit()" 
        />
        <!--tambahin type button biar ga lgsg ke submit-->
        <button
          type="button"
          class="btn btn-secondary btn-block mt-3"
          onclick="thisFileUpload()"
        >
          Tambah Gambar
        </button>
      </form>
    </div>
  </div>
  <form action="{{ route('dashboard-product-update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nama Produk</label>
              <input
                type="text"
                name="name"
                class="form-control"
                value="{{$product->name }}"
              />
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label>Kategori</label>
              <select name="categories_id" class="form-control">
                <option value="{{ $product->categories_id }}">{{ $product->category->name }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Harga Produk</label>
              <input
                type="number"
                name="price"
                class="form-control"
                value="{{ $product->price }}"
              />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Stok Produk</label>
              <input
                type="number"
                name="stock"
                class="form-control"
                value="{{ $product->stock }}"
              />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Berat Produk</label>
              <input
                type="number"
                name="weight"
                class="form-control"
                value="{{ $product->weight }}"
              />
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Deskripsi Produk</label>
              <textarea name="description" id="editor">{!! $product->description !!}</textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button
              type="submit"
              class="btn btn-success col-md-12"
            >
              Update Produk
            </button>
          </div>
           <div class="col-md-12">
            <a href="{{ route('dashboard-product-delete', $product->id )}}" 
               class="btn btn-danger btn-block mt-3">Hapus Produk
            </a>
          </div>
        </div>
        </div>
      </div>
    </div>
  </form>
  
    </div>
  </section>
</div>

@endsection

@push('addon-script')
<script>
    function thisFileUpload() {
        document.getElementById("file").click();
    }
</script>
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
