

<?php $__env->startSection('title'); ?>
    Transaksi berhasil - Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>
<div class="page-content page-success">
  <div class="section-success" data-aos="zoom-in">
    <div class="container">
      <div class="row align-items-center row-login justify-content-center">
        <div class="col-lg-6 text-center">
          <img src="images/success.svg" alt="" class="mb-4" />
          <h2>Transaksi di Proses</h2>
          <p>
            Silahkan tunggu konfirmasi Email dari kami dan kami akan
            menginformasikan secepat mungkin!!
          </p>
          <div>
            <a href="/dashboard.html" class="btn btn-success w-50 mt-4">
              My Dashboard
            </a>
            <a href="/index.html" class="btn btn-signup w-50 mt-2">
              Belanja Lagi!!
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->startSection('content'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/success.blade.php ENDPATH**/ ?>