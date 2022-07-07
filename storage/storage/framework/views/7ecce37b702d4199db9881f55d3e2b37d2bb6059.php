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
    <link href="/style/main.scss" rel="stylesheet" />
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
            <img src="/images/admin.png" class="my-4" style="max-width: 100px" alt="" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="<?php echo e(route('admin-dashboard')); ?>"
              class="list-group-item list-group-item-action"
            >
              Dashboard
            </a>
            <a
              href="<?php echo e(route('product.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/product')) ? 'active' : ''); ?>"
            >
              Produk
            </a>
            <a
              href="<?php echo e(route('product-gallery.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/product-gallery*')) ? 'active' : ''); ?>"
            >
              Produk Galeri
            </a>
            <a
              href="<?php echo e(route('category.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/category*')) ? 'active' : ''); ?>"
            >
              Kategori
            </a>
            <a
              href="<?php echo e(route('transaction.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/transaction*')) ? 'active' : ''); ?>"
            >
              Transaksi
            </a>
            <a
              href="<?php echo e(route('withdraw.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/withdraw*')) ? 'active' : ''); ?>"
            >
              Penarikan 
            </a>
            <a
              href="<?php echo e(route('user.index')); ?>"
              class="list-group-item list-group-item-action <?php echo e((request()->is('admin/user*')) ? 'active' : ''); ?>"
            >
              Pengguna
            </a>
            <a
              href="#"
              class="list-group-item list-group-item-action"
            >
              Pengaturan Akun
            </a>
            <a
              href="/index.html"
              class="list-group-item list-group-item-action"
            >
              Sign Out
            </a>
          </div>
        </div>

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
                        Hi, Siapa anda?
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/">Logout</a>
                    </div>
                    </li>
                    
                </ul>
                <!-- Mobile Menu -->
                <ul class="navbar-nav d-block d-lg-none mt-3">
                    <li class="nav-item">
                    <a class="nav-link" href="#"> Hi, Siapa anda? </a>
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
<?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/layouts/admin.blade.php ENDPATH**/ ?>