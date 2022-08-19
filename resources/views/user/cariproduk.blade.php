@extends('layouts.app')
@section('content')
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
                    Pencarian Produk
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

        <div class="site-section">
            <div class="container">
            <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="display-5" style="text-transform:uppercase">Hasil Pencarian Untuk : {{ $cari }} ({{ $total  }} Hasil)</h3>
            </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-9 order-2">

                <div class="row">
                    @php $incrementProduct = 0 @endphp
                    @forelse ($produks as $produk)
                        <div
                        class="col-6 col-md-4 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{  $incrementProduct += 100 }}"
                        >
                            <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div
                                    class="products-image"
                                    style="
                                        @if($produk->image)
                                            background-image: url('{{ asset('/storage/' . $produk->image) }}');
                                        @else
                                            background-color: #eee;
                                        @endif
                                    "
                                    ></div>
                                </div>
                                <div class="products-text">
                                    {{  $produk->name }}
                                </div>
                                <div class="products-price">
                                    Rp {{ number_format($produk->price,2,',','.') }}
                                </div>
                                <div>
                                    <div class="container text-center">
                                    <button type="submit" class="btn btn-success mt-2"> Detail</button>
                                </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div
                                class="col-12 text-center py-5"
                                data-aos="fade-up"
                                data-aos-delay="100"
                            >
                                No produk Found
                            </div>
                    @endforelse
                </div>
                {{-- <div class="row mb-5">
                    @foreach($produks as $produk)
                    <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                        <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">
                            <img src="{{ asset('storage/' . $produk->image) }}" alt="Image placeholder" class="img-fluid" width="100%" style="height:200px">
                        </a>
                        <div class="block-4-text p-4">
                        <h3><a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}">{{ $produk->name }}</a></h3>
                        <p class="mb-0">RP {{ $produk->price }}</p>
                        <a href="{{ route('user.produk.detail',['id' =>  $produk->id]) }}" class="btn btn-primary mt-2">Detail</a>
                        </div>
                    </div>
                    </div>
                    @endforeach
                    

                </div> --}}
                <div class="row" data-aos="fade-up">
                    <div class="col-md-12 text-right">
                    <div class="site-block-27">
                    {{ $produks->links() }}
                    </div>
                    </div>
                </div>
                </div>

            

                <!-- <div class="border p-4 rounded mb-4">
                    <div class="mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                    <div id="slider-range" class="border-primary"></div>
                    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
                    </div>

                    <div class="mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                    <label for="s_sm" class="d-flex">
                        <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
                    </label>
                    <label for="s_md" class="d-flex">
                        <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
                    </label>
                    <label for="s_lg" class="d-flex">
                        <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
                    </label>
                    </div>

                    <div class="mb-4">
                    <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
                    </a>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
                    </a>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
                    </a>
                    <a href="#" class="d-flex color-item align-items-center" >
                        <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
                    </a>
                    </div>

                </div> -->
                </div>
            </div>
            
            </div>
        </div>

</div>
@endsection