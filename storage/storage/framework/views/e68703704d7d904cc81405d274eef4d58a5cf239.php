<nav
      class="navbar navbar-expand-lg navbar-dark bg-dark navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-up-left"
    >
      <div class="container">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand">
          <img src="/images/image_sv.png" alt="Logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('categories')); ?>" class="nav-link">Categories</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Customer Service
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Tutorial HTML</a>
                <a class="dropdown-item" href="#">Tutorial CSS</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Tutorial Bootstrap</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <?php if(auth()->guard()->guest()): ?>
            <li class="nav-item ">
              <a href="<?php echo e(route('register')); ?>" class="nav-link">Sign-Up</a>
            </li>
            <li class="nav-item ">
              <a
                href="<?php echo e(route('login')); ?>"
                class="btn btn-info nav-link px-5 text-white"
                >Sign-In</a
              >
            </li>
            <?php endif; ?>
         

          <?php if(auth()->guard()->check()): ?>
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown" style="list-style: none">
              <a
                href="#"
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
              >
                <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                />
                <?php echo e(Auth::user()->name); ?>

              </a>
              <div class="dropdown-menu">
                <a href="<?php echo e(route('dashboard')); ?>" class="dropdown-item">Dashboard</a>
                <a href="<?php echo e(route('dashboard-setting-account')); ?>" class="dropdown-item"
                  >Settings</a
                >
                <div class="dropdown-divider"></div>
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

          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item" style="list-style: none">
              <a href="#" class="nav-link"> Hi. Siapa anda? </a>
            </li>
            <li class="nav-item" style="list-style: none">
              <a href="#" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
          <?php endif; ?>

        </div>
      </div>
    </nav><?php /**PATH C:\laragon\www\ecomsvkmm\resources\views/includes/navbar.blade.php ENDPATH**/ ?>