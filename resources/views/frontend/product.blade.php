@extends('frontend/layouts/main')
@section('title', 'Home : : TimyShop')
@section('content')

<main class="main__content_wrapper">
    
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Products</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Products</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start shop section -->
    <section class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <div class="shop__product--wrapper">
                        <div class="tab_content">
                            <div id="product_grid" class="tab_pane active show">
                                <div class="product__section--inner product__grid--inner">
                                    <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--n30">
                                        @foreach($products as $product)
                                        <div class="col mb-30">
                                            <div class="product__items ">
                                                <div class="product__items--thumbnail">
                                                    <a class="product__items--link" href="{{route('products.details',$product->slug)}}">
                                                        @foreach($product->images as $key => $image)
                                                        <img class="product__items--img product__primary--img" src="{{url('uploads/product/'.$image->image)}}" alt="{{$product->title}}">
                                                        @if($key == 0)
                                                            @php break; @endphp
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                    <div class="product__badge">
                                                        <span class="product__badge--items sale">New</span>
                                                    </div>
                                                </div>
                                                <div class="product__items--content text-center">
                                                    <h3 class="product__items--content__title h4"><a href="{{route('products.details',$product->slug)}}">{{$product->title}}</a></h3>
                                                    <div class="product__items--price">
                                                        @if($product->discount_price > 0)
                                                            <span class="current__price">$ {{$product->discount_price}}</span>
                                                            <span class="old__price">$ {{$product->price}}</span>
                                                        @else
                                                            <span class="old__price">$ {{$product->price}}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shop section -->
</main>
@stop
@push('scripts')
<script>
// alert('Hello');
</script>
@endpush