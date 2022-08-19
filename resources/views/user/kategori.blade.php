@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-trend-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>All Categories</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementCategory = 0 @endphp
                    @forelse ($categories as $category)
                        <div
                            class="col-6 col-md-3 col-lg-2"
                            data-aos="fade-up"
                            data-aos-delay="{{ $incrementCategory+= 100 }}"
                        >
                            <a href="{{ route('user.kategori',['id' => $category->id]) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img
                                    src=""
                                    alt=""
                                    class="w-100"
                                    />
                                </div>
                                <p class="categories-text">
                                    {{  $category->name }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div
                            class="col-12 text-center py-5"
                            data-aos="fade-up"
                            data-aos-delay="100"
                        >
                            No Categories Found
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection