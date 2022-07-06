

<?php $__env->startSection('title'); ?>
    Dashboard-Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
  >
    <div class="container-fluid">
      <div class="dashboard-heading">
        <h2 class="dashboard-title">Dashboard</h2>
        <p class="dashboard-subtitle">Look what you have made today!</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="card-body">
                <div class="dashboard-card-title">Pelanggan</div>
                <div class="dashboard-card-subtitle"><?php echo e($customer); ?></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="card-body">
                <div class="dashboard-card-title">Pendapatan</div>
                <div class="dashboard-card-subtitle">Rp. <?php echo e(number_format($revenue)); ?></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card mb-2">
              <div class="card-body">
                <div class="dashboard-card-title">Transaksi</div>
                <div class="dashboard-card-subtitle"><?php echo e($transaction_count); ?></div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="col-12 mt-2">
            <h5 class="mb-3">Recent Transactions</h5>
            <?php $__currentLoopData = $transaction_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a
                class="card card-list d-block"
                href="<?php echo e(route('dashboard-transaction-details', $transaction->id)); ?>"
              >
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-1">
                      <img
                        src="<?php echo e(Storage::url($transaction->product->galleries->first()->photos ?? '')); ?>"
                        class="w-75"
                      />
                    </div>
                    <div class="col-md-4"><?php echo e($transaction->product->name ?? ''); ?></div>
                    <div class="col-md-3"><?php echo e($transaction->transaction->user->name ?? ''); ?></div>
                    <div class="col-md-3"><?php echo e($transaction->created_at ?? ''); ?></div>
                    <div class="col-md-1 d-none d-md-block">
                      <img
                        src="/images/dashboard-arrow-right.svg"
                        alt=""
                      />
                    </div>
                  </div>
                </div>
              </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>