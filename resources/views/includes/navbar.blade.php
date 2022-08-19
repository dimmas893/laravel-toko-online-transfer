<nav
    class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
    data-aos="fade-down"
>
    <div class="container">
    <a href="{{ route('home') }}" class="navbar-brand">
        <img src="/template/images/logo.svg" alt="Logo" />
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
        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item">
              <form action="{{ route('user.produk.cari') }}" method="get" class="site-block-top-search" >
                @csrf
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" name="cari" placeholder="Search">
              </form>
            </li>
            
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kategori') }}" class="nav-link">Categories</a>
            </li>
            @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a
                    href="{{  route('login') }}"
                    class="btn btn-success nav-link px-4 text-white"
                    >Sign In</a
                    >
                </li>
            @endguest
        </ul>

        @auth
            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex mt-1">
                <li class="nav-item"> 
                    <a href="{{ route('wishlists.index') }}" class="nav-link d-inline-block mt-2">
                        <i class="fa-solid fa-heart"></i>
                        @if(Auth::check())
                            <span class="nav-box-number">{{ count(Auth::user()->wishlists)}}</span>
                        @else
                            <span class="nav-box-number">0</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item"> 
                    <a href="{{ route('user.keranjang') }}" class="nav-link d-inline-block mt-2">
                         <?php
                            $user_id = \Auth::user()->id;
                            $total_keranjang = \DB::table('keranjang')
                            ->select(DB::raw('count(id) as jumlah'))
                            ->where('user_id',$user_id)
                            ->first();
                          ?>
                            <img src="/template/images/icon-cart-filled.svg" alt="" />
                             <span class="count">{{ $total_keranjang->jumlah }}</span>
                    </a>
                </li>

                  <li class="nav-item"> 
                    <a href="{{ route('user.order') }}" class="nav-link d-inline-block mt-2">
                         <?php
                          $user_id = \Auth::user()->id;
                            $total_order = \DB::table('order')
                            ->select(DB::raw('count(id) as jumlah'))
                            ->where('user_id',$user_id)
                            ->where('status_order_id','!=',5)
                            ->where('status_order_id','!=',6)
                            ->first();
                          ?>
                       @if($total_order->jumlah > 0)
                             <img src="/template/images/halo.svg" alt="" height="20" width="20" />
                             <span class="count">{{ $total_order->jumlah }}</span>
                        @else
                            <img src="/template/images/halo.svg" alt="" height="20" width="20" />
                        @endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        href="#"
                        class="nav-link"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                    >
                        <img
                            src="/template/images/icon-user.png"
                            alt=""
                            class="rounded-circle mr-2 profile-picture"
                        />
                        Hi, {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ route('user.alamat') }}" class="dropdown-item">Pengaturan Alamat</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                               Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                </li>
            </ul>

            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        Hi, {{ Auth::user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.alamat') }}" class="nav-link">
                        Pengaturan Alamat
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.keranjang') }}" class="nav-link d-inline-block">
                        Keranjang
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('wishlists.index') }}" class="nav-link d-inline-block">
                        Wishlist
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.order') }}" class="nav-link d-inline-block">
                        Bayar Pesanan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link d-inline-block">
                        Logout
                    </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>    
        @endauth
        
    </div>
    </div>
</nav>