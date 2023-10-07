@extends('frontend/layouts/main')
@section('title', $product->meta_title.' : : TimyShop')
@section('content')
<main class="main__content_wrapper">
    
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">{{$product->title}}</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">{{$product->title}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start product details section -->
    <section class="product__details--section section--padding">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-md-2">
                <div class="col">
                    <div class="product__details--media">
                        <div class="product__media--preview  swiper">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                <div class="swiper-slide">
                                    <div class="product__media--preview__items">
                                        <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="{{url('uploads/product/'.$image->image)}}"><img class="product__media--preview__items--img" src="{{url('uploads/product/'.$image->image)}}" alt="{{$product->title}}"></a>
                                        <div class="product__media--view__icon">
                                            <a class="product__media--view__icon--link glightbox" href="{{url('uploads/product/'.$image->image)}}" data-gallery="product-media-preview">
                                                <svg class="product__media--view__icon--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                <span class="visually-hidden">Media Gallery</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product__media--nav swiper">
                            <div class="swiper-wrapper">
                                @foreach($product->images as $image)
                                <div class="swiper-slide">
                                    <div class="product__media--nav__items">
                                        <img class="product__media--nav__items--img" src="{{url('uploads/product/'.$image->image)}}" alt="{{$product->title}}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="swiper__nav--btn swiper-button-next"></div>
                            <div class="swiper__nav--btn swiper-button-prev"></div>
                        </div>
                    </div>
                </div>   
                <div class="col">
                    <div class="product__details--info">
                        
                            <h2 class="product__details--info__title mb-15">{{$product->title}}</h2>
                            <div class="product__details--info__price mb-10">
                                @if($product->discount_price > 0)
                                    <span class="current__price">$ {{$product->discount_price}}</span>
                                    <span class="old__price">$ {{$product->price}}</span>
                                @else
                                    <span class="old__price">$ {{$product->price}}</span>
                                @endif
                            </div>

                            <div class="product__details--info__desc mb-20 text-justify">
                                {!!$product->short_description!!}
                            </div>


                            <div class="product__variant">
                                <form method="post" action="{{route('add.cart')}}">
                                    <input type="hidden" name="product_id" value="{{$product->id}}"> 
                                    @csrf
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                            <p class="text-danger">{{ $error }}</p>
                                        @endforeach
                                    @endif
                                    <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input name="quantity" type="number" class="quantity__number quickview__value--number" value="1" />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="quickview__cart--btn primary__btn" type="submit">Add To Cart</button>  
                                    </div>
                                </form>
                                <div class="product__variant--list mb-15">
                                    <div class="product__details--info__meta">
                                        <p class="product__details--info__meta--list"><strong>Product Code : </strong>  <span>{{$product->code}}</span> </p>
                                        <p class="product__details--info__meta--list"><strong>Category : </strong>  <span>{{$product->cat->title}}</span> </p>

                                        {!!$product->other_description!!}
                                    </div>
                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product details section -->

    <!-- Start product details tab section -->
    <section class="product__details--tab__section section--padding">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <ul class="product__details--tab d-flex mb-30">
                        <li class="product__details--tab__list active" data-toggle="tab" data-target="#description">Description</li>
                    </ul>
                    <div class="product__details--tab__inner border-radius-10">
                        <div class="tab_content">
                            <div id="description" class="tab_pane active show">
                                <div class="product__tab--content text-justify">
                                    {!!$product->description!!}
                                </div> 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End product details tab section -->

</main>
@stop
@push('scripts')
<script>
</script>
@endpush