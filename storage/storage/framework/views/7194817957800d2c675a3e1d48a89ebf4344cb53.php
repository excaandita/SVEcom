

<?php $__env->startSection('title'); ?>
    Dashboard-Sekolah Vokasi E-COM
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
          <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transaction</h2>
                <p class="dashboard-subtitle">Look what you have made today!</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12 mt-2">
                    <ul
                      class="nav nav-pills mb-3"
                      id="pills-tab"
                      role="tablist"
                    >
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link active"
                          id="pills-home-tab"
                          data-toggle="pill"
                          href="#pills-home"
                          role="tab"
                          aria-controls="pills-home"
                          aria-selected="true"
                          >Buy Products</a
                        >
                      </li>
                      <li class="nav-item" role="presentation">
                        <a
                          class="nav-link"
                          id="pills-profile-tab"
                          data-toggle="pill"
                          href="#pills-profile"
                          role="tab"
                          aria-controls="pills-profile"
                          aria-selected="false"
                          >Sell Product</a
                        >
                      </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                      <div
                        class="tab-pane fade show active"
                        id="pills-home"
                        role="tabpanel"
                        aria-labelledby="pills-home-tab"
                      >
                        <!-- view list barang  -->
                        <?php $__currentLoopData = $buyTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b_transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <a
                            class="card card-list d-block"
                            href="<?php echo e(route('dashboard-transaction-details', $b_transaction->id)); ?>"
                          >
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img
                                    src="<?php echo e(Storage::url($b_transaction->product->galleries->first()->photos ?? '')); ?>"
                                    class="w-50"
                                    alt=""
                                  />
                                </div>
                                <div class="col-md-4"><?php echo e($b_transaction->product->name); ?></div>
                                <div class="col-md-3"><?php echo e($b_transaction->product->user->store_name); ?></div>
                                <div class="col-md-3"><?php echo e($b_transaction->created_at); ?></div>
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
                      <div
                        class="tab-pane fade"
                        id="pills-profile"
                        role="tabpanel"
                        aria-labelledby="pills-profile-tab"
                      >
                        <?php $__currentLoopData = $sellTransactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s_transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <a
                            class="card card-list d-block"
                            href="<?php echo e(route('dashboard-transaction-details', $s_transaction->id)); ?>"
                          >
                            <div class="card-body">
                              <div class="row">
                                <div class="col-md-1">
                                  <img
                                    src="<?php echo e(Storage::url($s_transaction->product->galleries->first()->photos ?? '')); ?>"
                                    class="w-50"
                                    alt=""
                                  />
                                </div>
                                <div class="col-md-4"><?php echo e($s_transaction->product->name); ?></div>
                                <div class="col-md-3"><?php echo e($s_transaction->transaction->user->name); ?></div>
                                <div class="col-md-3"><?php echo e($s_transaction->created_at); ?></div>
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
          </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/pages/dashboard-transactions.blade.php ENDPATH**/ ?>