
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
          <div class="col-lg-2 col-md-2">
            <div class="header__logo">
              <a href="./index.html"><img src="{{ asset('img/LOGO-SV-1.webp') }}" style="height: 80px;width:auto"/></a>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 " style="margin-top: 30px">
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
                <li><a href="{{ route('categories') }}">Kategori</a></li>
                @endif
                @endauth
                
              </ul>
               
            </nav>
            
          </div>
          <div class="col-lg-4 col-md-4 mt-4">
            <div class="header__nav__option">
              <a href="{{ route('listproduct') }}" class="search-switch"
                ><img src="images/search.png" alt=""
              /></a>
              @guest
              <a href="#"
              ><img src="img/icon/cart.png" alt="" /> <span>0</span></a
            >
              @endguest
              @auth
                  @if (auth()->user()->roles != 'MAHASISWA')
                  <a href="{{ route('cart') }}">
                    @php
                      $carts = \App\Models\Cart::where('users_id', Auth::user()->id)->sum('quantity'); 
                    @endphp
                    @if ($carts > 0)
                      <img src="{{ asset('img/icon/cart.png') }}" alt="" />
                      <span>{{ $carts }}</span>
                    @else
                      <img src="{{ asset('img/icon/cart.png') }}" alt="" /><span>0</span>
                    @endif
                  </a>
                  @endif

                  {{-- <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false"
                  style="color: black">
                    <img
                  src="{{ asset('images/icon-user.png') }}"
                  alt=""
                  style="height: 40px;width:40px"
                  class="rounded-circle mr-3 profile-picture"
                />
                @if (Str::length(Auth::user()->name) > 18)
              {!! Str::substr(Auth::user()->name, 0, 18) !!}
              @else
              {{ Auth::user()->name }}
              @endif --}}
             
                   
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
                  @if (auth()->user()->roles == 'MAHASISWA')
                      <a href="{{ route('mahasiswa-dashboard')}}" class="dropdown-item">Dashboard</a>
                  @endif
                    <a class="dropdown-item" href="{{ route('dashboard-setting-account')}}">Pengaturan</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                  </div>
              @endauth
            </div>
          </div>
          
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
      </div>
    </header>
    <!-- Header Section End -->