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

    <title>Keranjang</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/template/style/main.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Navigation -->
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

    <!-- Page Content -->
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
                <form class="col-md-12" method="post" action="{{ route('user.keranjang.update') }}">
                 @csrf
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Produk</th>
                    <th scope="col">harga</th>
                    <th scope="col">jumlah</th>
                    <th scope="col">total</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $subtotal=0; foreach($keranjangs as $keranjang): ?>
                  <tr>
                    <td style="width: 20%;">
                      <img
                        src="{{ asset('/storage/'.$keranjang->image) }}"
                        alt=""
                        class="cart-image"
                      />
                    </td>
                    <td style="width: 20%;">
                      <div class="product-title">{{ $keranjang->nama_produk }}</div>
                    </td>
                    <td style="width: 20%;">
                      <div class="product-title">Rp. {{ number_format($keranjang->price,2,',','.') }} </div>
                    </td>

                     <td style="width: 20%;">
                    <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>
                    <input type="hidden" name="id[]" value="{{ $keranjang->id }}">
                    <input type="text" name="qty[]" class="form-control text-center" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" value="{{ $keranjang->qty }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                    </div>
                </td>
                 <?php
                    $total = $keranjang->price * $keranjang->qty;
                    $subtotal = $subtotal + $total;
                ?>
                <td>Rp. {{ number_format($total,2,',','.') }}</td>
                    <td style="width: 10%;">
                      <a href="{{ route('user.keranjang.delete',['id' => $keranjang->id]) }}" class="btn btn-remove-cart">
                        Remove
                      </a>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>

          <hr>
                   <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-sm btn-block"><span>Update Keranjang</span></button>
                </div>
            </div>
        </form>


          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
            </div>
            <div class="col-12">
              <h2>Payment Informations</h2>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-4 col-md-8">
              <div class="product-title text-success">Rp. {{ number_format($subtotal,2,',','.') }}</div>
              <div class="product-subtitle">Total Pembayaran</div>
            </div>
            <div class="col-8 col-md-4">
              <a
                href="{{ route('user.checkout') }}"
                class="btn btn-success mt-4 px-4 btn-block"
              >
                Checkout Now
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>

@include('includes.footer')

    <!-- Bootstrap core JavaScript -->
    <script src="/template/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="/shopper/js/owl.carousel.min.js"></script>
  <script src="/shopper/js/main.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/template/script/navbar-scroll.js"></script>
      <script>
    //sweetalert for success or error message
    @if(session()->has('success'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('success') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()->has('error'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @endif
  </script>
  </body>
</html>
