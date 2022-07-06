

<?php $__env->startSection('title'); ?>
    Tambah Pengajuan Penarikan-Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Seller Dashboard - Pengajuan Penarikan</h2>
            <p class="dashboard-subtitle">Tambah Pengajuan Penarikan</p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route('dashboard-withdraw-store')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Kode Transaksi</label>
                                        <select name="transaction_details_id" class="form-control" required>
                                            <?php $__currentLoopData = $sellTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <option value="<?php echo e($transaction->code); ?>"><?php echo e($transaction->code); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Pengaju</label>
                                            <input type="text" name="name" class="form-control" required>
                                            <p class="text-muted">
                                              Nama harus sesuai dengan nama pemilik Rekening
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Total Penarikan</label>
                                          <input type="number" name="total_withdraw" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>Bank</label>
                                          <select name="bank" class="form-control">
                                                <option value="" disabled>Pilih Bank</option>
                                                <option value="BRI">BRI</option>
                                                <option value="MANDIRI">MANDIRI</option>
                                                <option value="BNI">BNI</option>
                                                <option value="BTN">BTN</option>
                                                <option value="BCA">BCA</option>
                                                <option value="BSI">BSI</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label>Nomor Rekening</label>
                                          <input type="text" name="rekening" class="form-control" required>
                                      </div>
                                    </div>
                                    <input type="hidden" name="users_id" value="<?php echo e(Auth::user()->id); ?>">
                                    <input type="hidden" name="status" value="PENDING">
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            Simpan
                                        </button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/dashboard-withdraw-create.blade.php ENDPATH**/ ?>