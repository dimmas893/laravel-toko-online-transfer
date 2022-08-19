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

    <title>Produk Detail</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="/template/style/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
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

    <!-- Page Content -->
  <div class="page-content page-details">
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
                    Product Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-gallery" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img
                  src="{{asset('/storage/' . $produk->image)}}"
                  class="w-100 main-image"
                  alt=""
                />
              </transition>
            </div>
          </div>
        </div>
      </section>
      
      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
               <form action="{{ route('user.keranjang.simpan') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                <h1>{{ $produk->name }}</h1>
                <div class="price">Rp {{ number_format($produk->price,2,',','.') }} </div>
                    @if(Route::has('login'))
                            @auth
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endauth
                    @endif
               
                    <input type="hidden" name="products_id" value="{{ $produk->id }}">
                    
                        <input type="hidden" name="product_id" value="{{ $produk->id }}">

                    <small>Sisa Stok {{ $produk->stok }}</small>

                    <input type="hidden" value="{{ $produk->stok }}" id="sisastok">
                    <div class="input-group mb-3" style="max-width: 120px;">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                    </div>

                    <input type="text" name="qty" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <div class="input-group-append">
                         <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                    </div>
                    
                    </div>
                    </div>

                    
              <div class="col-lg-2" data-aos="zoom-in">
                @auth
                  <button
                  class="btn btn-success px-4 text-white btn-block mb-3"
                  type="submit"
                  >Add to Cart</button
                >
              </form>
                
               <form action="{{ route('wishlists.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if(Route::has('login'))
                            @auth
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endauth
                    @endif
                    <input type="hidden" name="product_id" value="{{ $produk->id }}">
                <button class="btn btn-danger px-4 text-white btn-block mb-3" type="submit">Add to Wishlist</button>
              </form>

               
            
                @else
                <a
                href="{{route('login')}}"
                class="btn btn-success  text-white btn-block mb-3"
                  >Sign in to add</a>

                <form action="{{ route('wishlists.store') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if(Route::has('login'))
                            @auth
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            @endauth
                    @endif
                    <input type="hidden" name="product_id" value="{{ $produk->id }}">
                <button class="btn btn-danger px-4 text-white btn-block mb-3" type="submit">Add to Wishlist</button>
              </form>
              
                @endauth
              </div>
            </div>
          </div>
        </section>
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {{ $produk->description }}
              </div>
            </div>
          </div>
        </section>



        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Customer Review </h5>
                <hr>
              </div>
            </div>
            
            <div class="row">
              <div class="col-12 col-lg-6">
                @if (count($review) > 0)

                @foreach ($review as $item)
                <ul class="list-unstyled">
                  <li class="media">
                    <img
                      src="{{ $item->user->profile_photo_path ?? 'https://ui-avatars.com/api/?name=' . $item->user->name }}"
                      alt=""
                      class="mr-3 rounded-circle"
                    />
                    <div class="media-body">
                      <div class="row">
                         <div class="col-6 text-left">
                           <h5 class="mt-2 mb-1">{{$item->user->name}}</h5>
                           <p class=""> {{$item->comment}}</p>
                        </div>
                        <div class="col-6 text-right">
                            @for ($i=0; $i < $item->rating; $i++)
                               <font color="yellow"><i class="fa fa-star active"></i></font>
                             @endfor
                             <p>{{$item->created_at->diffForHumans()}}</p>
                        </div>
                       <br />
                      </div>

                    </div>
                  </li>
                </ul>
                @endforeach

                @else
                <ul class="list-unstyled">
                  <li class="media">
                   Belum Ada Comentar
                    
                  </li>

                   @auth
                    <div class="media-body my-4">
                     <form action="{{ route('reviews.store') }}" method="POST">
                       @csrf
                        <input type="hidden" name="product_id" value="{{ $produk->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                          <fieldset class="rating" required>
                              <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                              <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                              <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                              <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                              <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                          </fieldset>
                        <textarea name="comment" placeholder="Masukan Pesan" cols="20" rows="5" class="form-control" required></textarea>
                        <button type="submit" class="btn btn-success mt-2"> Send</button>
                     </form>
                    </div>
                   @endauth
               </ul>

            @if (count($review) > 0)
              <div class="media-body my-4">
                     <form action="{{ route('reviews.store') }}" method="POST">
                       @csrf
                        <input type="hidden" name="product_id" value="{{ $produk->id }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                          <fieldset class="rating" required>
                              <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                              <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                              <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                              <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                              <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                          </fieldset>
                        <textarea name="comment" placeholder="Masukan Pesan" cols="20" rows="5" class="form-control" required></textarea>
                        <button type="submit" class="btn btn-success mt-2"> Send</button>
                      </form>
                    </div>
              </div>
            @endif
            
              @endif
            </div>
          </div>
        </section>

                                                    {{-- <form class="form-default" role="form" action="{{ route('reviews.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $produk->id }}">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="text-uppercase c-gray-light">{{__('Your name')}}</label>
                                                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" disabled required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="" class="text-uppercase c-gray-light">{{__('Email')}}</label>
                                                                    <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" required disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="c-rating mt-1 mb-1 clearfix d-inline-block">
                                                                    <input type="radio" id="star5" name="rating" value="5" required/>
                                                                    <label class="star" for="star5" title="Awesome" aria-hidden="true"></label>
                                                                    <input type="radio" id="star4" name="rating" value="4" required/>
                                                                    <label class="star" for="star4" title="Great" aria-hidden="true"></label>
                                                                    <input type="radio" id="star3" name="rating" value="3" required/>
                                                                    <label class="star" for="star3" title="Very good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star2" name="rating" value="2" required/>
                                                                    <label class="star" for="star2" title="Good" aria-hidden="true"></label>
                                                                    <input type="radio" id="star1" name="rating" value="1" required/>
                                                                    <label class="star" for="star1" title="Bad" aria-hidden="true"></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" rows="4" name="comment" placeholder="{{__('Your review')}}" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-styled btn-base-1 btn-circle mt-4">
                                                                {{__('Send review')}}
                                                            </button>
                                                        </div>
                                                    </form> --}}
      </div>
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
  <style>
  fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style untuk rating star *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

.rating > input:checked ~ label, /* memperlihatkan warna emas pada saat di klik */
.rating:not(:checked) > label:hover, /* hover untuk star berikutnya */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover untuk star sebelumnya  */

.rating > input:checked + label:hover, /* hover ketika mengganti rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* seleksi hover */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
</style>
  </body>
</html>
