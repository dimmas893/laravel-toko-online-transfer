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
                    Wishlist
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

    <div class="container">

                <div class="row">
                    @php $incrementProduct = 0 @endphp
                    @forelse ($wishlists as $key => $wishlist)
                        <div
                        class="col-6 col-md-4 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{  $incrementProduct += 100 }}"
                        >
                            <a href="{{ route('user.produk.detail',['id' =>  $wishlist->product->id]) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div
                                    class="products-image"
                                    style="
                                        @if($wishlist->product->image)
                                            background-image: url('{{ asset('/storage/' . $wishlist->product->image) }}');
                                        @else
                                            background-color: #eee;
                                        @endif
                                    "
                                    ></div>
                                </div>
                                <div class="products-text">
                                    {{  $wishlist->product->name }}
                                </div>
                                <div class="products-price">
                                    Rp {{ number_format($wishlist->product->price,2,',','.') }}
                                </div>
                                <div>
                                    <div class="container text-center">
                                    <button type="submit" class="btn btn-success mt-2"> Detail</button>
                                    <form action="{{route('wishlists.destroy', $wishlist->id)}}" method="POST">
                                       @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-2">
                                            Delete
                                        </button>
                                    </form>
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
                                No Wishlists Found
                            </div>
                    @endforelse
                </div>
    
    </div>
</div>
@endsection

