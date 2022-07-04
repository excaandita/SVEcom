<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php echo $__env->yieldPushContent('prepend-style'); ?>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
      integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
      crossorigin="anonymous"
    />
    <?php echo $__env->yieldPushContent('addon-style'); ?>
  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!--sideebar-->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/dashboard-store-logo.svg" class="my-4" alt="" />
          </div>
          <div class="list-group list-group-flush">
              <a
                href="<?php echo e(route('dashboard')); ?>"
                class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard')) ? 'active' : ''); ?>"
              >
                Dashboard
              </a>
              <!-- fungsi if untuk memisah dan menampilkan kolom produk jika roles yang sedang login adalah user-->
              <?php if(auth()->user()->roles == 'USER'): ?>
                <a
                  href="<?php echo e(route('dashboard-product')); ?>"
                  class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/products')) ? 'active' : ''); ?>"
                >
                  Produk
                </a>
              <?php endif; ?>
              <a
                href="<?php echo e(route('dashboard-transaction')); ?>"
                class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/transactions')) ? 'active' : ''); ?>"
              >
                Transaksi
              </a>
              <!-- fungsi if untuk memisah dan menampilkan kolom setting-store jika roles yang sedang login adalah user-->
              <?php if(auth()->user()->roles == 'USER'): ?>
                <a
                  href="<?php echo e(route('dashboard-withdraw')); ?>"
                  class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/withdraw')) ? 'active' : ''); ?>"
                >
                  Pengajuan Penarikan 
                </a>
                <a
                  href="<?php echo e(route('dashboard-setting-store')); ?>"
                  class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/settings*')) ? 'active' : ''); ?>"
                >
                  Pengaturan Toko
                </a>
              <?php endif; ?>
              <a
                href="<?php echo e(route('dashboard-setting-account')); ?>"
                class="list-group-item list-group-item-action <?php echo e((request()->is('dashboard/account*')) ? 'active' : ''); ?>"
              >
                Pengaturan Akun
              </a>
              <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
              >
                Log Out
              </a>
            
          </div>
        </div>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
          <?php echo csrf_field(); ?>
        </form>

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
          >
            <div class="container-fluid">
                <button
                class="btn btn-secondary d-md-none mr-auto mr-2"
                id="menu-toggle"
                >
                &laquo; Menu
                </button>

                <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
                >
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-none d-lg-flex">
                    <li class="nav-item dropdown">
                    <a
                        class="nav-link"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                    >
                        <img
                        src="/images/icon-user.png"
                        alt=""
                        class="rounded-circle mr-2 profile-picture"
                        />
                        Hi, <?php echo e(Auth::user()->name); ?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('home')); ?>"
                        >Back to Store</a
                        >
                        <a class="dropdown-item" href="<?php echo e(url('dashboard/account')); ?>"
                        >Settings</a
                        >
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                          onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                          Log Out
                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                    </li>
                    <li class="nav-item" style="list-style: none">
                      <a href="<?php echo e(route('cart')); ?>" class="nav-link d-inline-block mt-2">
                        <?php
                          $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->count();
                        ?>
                        <?php if($carts > 0): ?>
                          <img src="/images/icon-cart-filled.svg" alt="" />
                          <div class="cart-badge"><?php echo e($carts); ?></div>
                        <?php else: ?>
                          <img src="/images/icon-cart-empty.svg" alt="" />
                        <?php endif; ?>
                        
                      </a>
                    </li>
                </ul>
                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none mt-3">
                    <li class="nav-item">
                    <a class="nav-link" href="#"> Hi, <?php echo e(Auth::user()->name); ?> </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link d-inline-block" href="#"> Cart </a>
                    </li>
                </ul>
                </div>
            </div>
          </nav>

            
            <?php echo $__env->yieldContent('content'); ?>

        </div>
      </div>
    </div>
  </body>
  <!-- Bootstrap core JavaScript -->
  <?php echo $__env->yieldPushContent('prepend-script'); ?>
  
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
   <?php echo $__env->yieldPushContent('addon-script'); ?>
</html>
<?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>