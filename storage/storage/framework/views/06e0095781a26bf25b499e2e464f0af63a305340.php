

<?php $__env->startSection('title'); ?>
    Kategori - Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content page-home" style="margin-top: 80px">
  <section class="store-trend-categories mt-4">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h5>All Categories</h5>
        </div>
      </div>
      <div class="row">
      <!--category Gadget-->
        <?php $incrementCategory = 0 ?>
        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div
            class="col-6 col-md-3 col-lg-2"
            data-aos="fade-up"
            data-aos-delay="<?php echo e($incrementCategory+= 100); ?>"
          >
            <a href="<?php echo e(route('categories-detail', $category->slug)); ?>" class="component-categories d-block">
              <div class="categories-image">
                <img src="<?php echo e(Storage::url($category->photo)); ?>" class="w-100" />
              </div>
              <p class="categories-text"><?php echo e($category->name); ?></p>
            </a>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12 text-center py-5" data-aos="fade-up"
            data-aos-delay="100">
              Tidak Ada Kategori
            </div>
        <?php endif; ?>
      <!-- Batas Kategori -->
      </div>
    </div>
  </section>

  <section class="store-new-products">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up">
          <h5>All Products</h5>
        </div>
      </div>
      <div class="row">
      <!-- batas new Product-->
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
  </section>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/category.blade.php ENDPATH**/ ?>