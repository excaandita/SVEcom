

<?php $__env->startSection('title'); ?>
    Kategori - Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-home" style="margin-top: 80px">
  <section class="store-trend-categories mt-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h5>Profile Toko</h5>
        </div>
      </div>
      <div class="row">
      <!--category Gadget-->
      <section
      class="store-breadcrumbs"
      data-aos="fade-down"
      data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="<?php echo e(Route('home')); ?>">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Profil toko</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
  </section>

  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-md-4">      
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <!-- Foto belum dipakai 

              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
              </div>

              -->
              <h3 class="profile-username text-center"><?php echo e($users->store_name); ?></h3>
              <p class="text-muted text-center"><?php echo e($users->name); ?></p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                <b>Status Toko</b> <a class="float-right"> 
                  <?php if($users->store_status == 1): ?>
                    Buka
                  <?php else: ?>
                    Tutup Sementara
                  <?php endif; ?></a>
                </li>
                <li class="list-group-item">
                <b>Jumlah Produk</b> <a class="float-right"><?php echo e($products_count); ?></a>
                </li>
                <li class="list-group-item">
                <b>Barang Terjual</b> <a class="float-right"><?php echo e($sellTransactions); ?></a>
                </li>
              </ul>
              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
          </div>

          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Education</strong>
                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>
                <hr>
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                <p class="text-muted">Malibu, California</p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                <p class="text-muted">
                <span class="tag tag-danger">UI Design</span>
              <span class="tag tag-success">Coding</span>
              <span class="tag tag-info">Javascript</span>
              <span class="tag tag-warning">PHP</span>
              <span class="tag tag-primary">Node.js</span>
              </p>
              <hr>
              <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
          </div>
        </div>

        <div class="col-md-8">
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>All Products</h5>
            </div>
          </div>
          <div class="row">
            <!-- batasProduct-->
            <?php $incrementProduct = 0 ?>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div
              class="col-6 col-md-6 col-lg-4"
              data-aos="fade-up"
              data-aos-delay="<?php echo e($incrementProduct+= 100); ?>"
              >
                <a href="<?php echo e(route('detail', $product->slug)); ?>" class="component-products d-block">
                  <div class="products-thumbnail">
                    <div
                      class="products-image"
                      style="
                        <?php if($product->galleries->count()): ?>
                          background-image: url('<?php echo e(Storage::url($product->galleries->first()->photos)); ?>')
                        <?php else: ?>
                          background-color: #eee
                        <?php endif; ?>" 
                    >
                    </div>
                  </div>
                  <div class="products-text"><?php echo e($product->name); ?></div>
                  <div class="products-price">Rp. <?php echo e(number_format($product->price)); ?></div>
                </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <div class="col-12 text-center py-5" data-aos="fade-up"
                  data-aos-delay="100">
                Tidak ada produk
              </div>
            <?php endif; ?>
                  
                  
            <!-- batas Product-->
          </div>
        </div>
      </div>
    </div>

  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/profile.blade.php ENDPATH**/ ?>