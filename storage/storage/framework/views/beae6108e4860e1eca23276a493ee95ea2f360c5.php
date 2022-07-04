

<?php $__env->startSection('title'); ?>
    Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-home" style="margin-top: 80px">
    <section class="store-carousel">
      <div class="container">
        <div class="row">
          <div class="col-lg-12" data-aos="zoom-in-up">
            <div
              id="storeCarousel"
              class="carousel slide"
              data-ride="carousel"
            >
              <ol class="carousel-indicators">
                <li data-target="# storeCarousel"data-slide-to="0"class="active"></li>
                <li data-target="#storeCarousel" data-slide-to="1"></li>
                <li data-target="#storeCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img
                    class="d-block w-100 "
                    src="images/banner.jpg"
                    alt="First slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="images/banner.jpg"
                    alt="Second slide"
                  />
                </div>
                <div class="carousel-item">
                  <img
                    class="d-block w-100"
                    src="images/banner.jpg"
                    alt="Third slide"
                  />
                </div>
              </div>
              <a
                class="carousel-control-prev"
                href="#carouselExampleIndicators"
                role="button"
                data-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Previous</span>
              </a>
              <a
                class="carousel-control-next"
                href="#storeCarousel"
                role="button"
                data-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="store-trend-categories mt-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h5>Trend Categories</h5>
          </div>
        </div>
        <div class="row">
            <?php $incrementCategory = 0 ?>
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <div
                class="col-6 col-md-3 col-lg-2"
                data-aos="fade-down-right"
                data-aos-delay="<?php echo e($incrementCategory+= 200); ?>"
              >
                <a href="<?php echo e(route('categories-detail', $category->slug)); ?>" class="component-categories d-block">
                  <div class="categories-image">
                    <img src="<?php echo e(Storage::url($category->photo)); ?>" class="w-100" />
                  </div>   
                    <p class="categories-text"><?php echo e($category->name); ?></p>
                </a>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center py-5" data-aos="fade-down-right"
                data-aos-delay="200">
                  Tidak Ada Kategori
                </div>
            <?php endif; ?>

          
          <!-- Batas Kategori -->
        </div>
      </div>
    </section>

    <div class="section store-new-products">
      <div class="container">
        <div class="row">
          <div class="col-12" data-aos="fade-up">
            <h5>New Products</h5>
          </div>
        </div>
        <div class="row">
          <?php $incrementProduct = 0 ?>
          <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div
            class="col-6 col-md-4 col-lg-3"
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
                      <?php endif; ?>
                    "
                  ></div>
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

          
          <!-- batas new Product-->
        </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/home.blade.php ENDPATH**/ ?>