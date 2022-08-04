
    <!-- Header Section Begin -->
    <header class="header">
      <div class="header__top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-7">
              <div class="header__top__left">
                <p>Free shipping, 30-day return or refund guarantee.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-5">
              <div class="header__top__right">
                <div class="header__top__links ">
                  @guest
                  <a class ="huruf" href="{{ route('register')}}">Sign Up</a>
                  <a class ="huruf" href="{{ route('login')}}">Sign In</a>
                  @endguest

                  @auth
                  <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown" style="list-style: none">
              <a
                href="#"
                class="nav-link huruf"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
              >
                <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-3 profile-picture"
                />
                Hi, {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu">
                @if (auth()->user()->roles == 'ADMIN')
                <a href="{{route('admin-dashboard')}}" class="dropdown-item">Admin</a>
                @endif
                @if (auth()->user()->roles == 'USER')
                <a href="{{ route('seller-dashboard')}}" class="dropdown-item">Dashboard</a>
                @endif
                @if (auth()->user()->roles == 'BUYER')
                <a href="{{ route('buyer-dashboard')}}" class="dropdown-item">Dashboard</a>
                @endif

                <a href="{{ route('dashboard-setting-account')}}" class="dropdown-item"
                  >Pengaturan</a
                >
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                   Log Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </div>
            </li>
                  @endauth
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <div class="header__logo">
              <a href="{{ route('home')}}"><img src="/images/image_sv.png" alt="" /></a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <nav class="header__menu mobile-menu">
              <ul>
                @guest
                <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ (request()->is('listproduct')) ? 'active' : '' }}"><a href="{{ route('listproduct') }}">Produk</a></li>
                <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                <li class="{{ (request()->is('categories')) ? 'active' : '' }}"><a href="{{ route('categories') }}">Kategori</a></li>
                <li>
                  <a href="#">Pages</a>
                  <ul class="dropdown">
                    <li><a href="./about.html">About Us</a></li>
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                  </ul>
                </li>
                @endguest
                @auth
                @if (auth()->user()->roles == 'MAHASISWA')
                <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                @else
                <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ (request()->is('listproduct')) ? 'active' : '' }}"><a href="{{ route('listproduct') }}">Produk</a></li>
                <li><a href="{{ route('portofolio') }}">Portofolio</a></li>
                <li class="{{ (request()->is('categories')) ? 'active' : '' }}"><a href="{{ route('categories') }}">Kategori</a></li>
                @if (auth()->user()->roles == 'ADMIN')
                <li><a href="{{route('admin-dashboard')}}">Admin</a></li>
                    @endif
                    @if (auth()->user()->roles == 'USER')
                    <li><a href="{{ route('seller-dashboard')}}">Dashboard</a></li>
                    @endif
                    @if (auth()->user()->roles == 'BUYER')
                    <li><a href="{{ route('buyer-dashboard')}}">Dashboard</a></li>
                    @endif
                @endif
                @endauth
                
              </ul>
               
            </nav>
            
          </div>
          
          <div class="col-lg-3 col-md-3">
            <div class="header__nav__option">
              <a href="{{ route('listproduct') }}" class="search-switch"
                ><img src="images/search.png" alt=""
              /></a>
              @auth
              <a href="{{ route('cart') }}"
                ><img src="images/cart.png" alt="" /> 
                
                @php
                  $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->sum('quantity'); 
                @endphp
                @if ($carts > 0)
                <span>{{ $carts }}</span></a
              >@else
                   <span>0</span></a
              >
                @endif
               @endauth
            </div>
          </div>
          
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
      </div>
    </header>
    <!-- Header Section End -->