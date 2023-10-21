@extends('frontend/layouts/main')
@section('title', 'Contact : : TimyShop')
@section('content')
<main class="main__content_wrapper">
    
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">Contact Us</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Contact Us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start contact section -->
    <section class="contact__section section--padding">
        <div class="container">
            <div class="section__heading mb-40">
                <h2 class="section__heading--maintitle contact__section--hrading mb-10">Get In Touch</h2>
                <p class="contact__section--hrading__desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere voluptatibus delectus blanditiis rerum, explicabo <br> aspernatur magni nihil distinctio voluptatum quo sit quidem minima repellat sapiente.</p>
            </div>
            <div class="main__contact--area">
                <div class="row align-items-center row-md-reverse">
                    <div class="col-lg-5">
                        <div class="contact__info border-radius-10">
                            <div class="contact__info--items">
                                <h3 class="contact__info--content__title text-white mb-15">Contact Us</h3>
                                <div class="contact__info--items__inner d-flex">
                                    <div class="contact__info--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.568" height="31.128" viewBox="0 0 31.568 31.128">
                                            <path id="ic_phone_forwarded_24px" d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z" transform="translate(-3 -1)" fill="currentColor"/>
                                        </svg>
                                    </div>
                                    <div class="contact__info--content">
                                        <p class="contact__info--content__desc text-white">Change the design through a range <br> <a href="tel:{{@settings()->primary_contact}}">{{@settings()->primary_contact}}</a> <a href="tel:{{@settings()->secondary_contact}}">{{@settings()->secondary_contact}}</a>   </p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact__info--items">
                                <h3 class="contact__info--content__title text-white mb-15">Email Address</h3>
                                <div class="contact__info--items__inner d-flex">
                                    <div class="contact__info--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13" viewBox="0 0 31.57 31.13">
                                            <path id="ic_email_24px" d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z" transform="translate(-2 -4)" fill="currentColor"/>
                                        </svg>  
                                    </div>
                                    <div class="contact__info--content">
                                        <p class="contact__info--content__desc text-white"> <a href="mailto:{{@settings()->primary_email}}">{{@settings()->primary_email}}</a> <br> <a href="mailto:{{@settings()->secondary_email}}">{{@settings()->secondary_email}}</a></p> 
                                    </div>
                                </div>
                            </div>
                            <div class="contact__info--items">
                                <h3 class="contact__info--content__title text-white mb-15">Office Location</h3>
                                <div class="contact__info--items__inner d-flex">
                                    <div class="contact__info--icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13" viewBox="0 0 31.57 31.13">
                                            <path id="ic_account_balance_24px" d="M5.323,14.341V24.718h4.985V14.341Zm9.969,0V24.718h4.985V14.341ZM2,32.13H33.57V27.683H2ZM25.262,14.341V24.718h4.985V14.341ZM17.785,1,2,8.412v2.965H33.57V8.412Z" transform="translate(-2 -1)" fill="currentColor"/>
                                        </svg> 
                                    </div>
                                    <div class="contact__info--content">
                                        <p class="contact__info--content__desc text-white">{!!@settings()->primary_address!!}</p> 
                                        <p class="contact__info--content__desc text-white">{!!@settings()->secondary_address!!}</p> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible mb-2">
                              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                              {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="contact__form">
                            <form class="contact__form--inner" method="post"  action="{{route('contact.enquiry')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="name">Name <span class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" name="name" id="name" placeholder="Name" type="text" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="mobile">Mobile <span class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" name="mobile" id="mobile" placeholder="Mobile" type="text" value="{{old('mobile')}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="email">Email <span class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" name="email" id="email" placeholder="Email" type="text" value="{{old('email')}}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="contact__form--list mb-20">
                                            <label class="contact__form--label" for="city">City <span class="contact__form--label__star">*</span></label>
                                            <input class="contact__form--input" name="city" id="city" placeholder="City" type="text" value="{{old('city')}}">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="contact__form--list mb-10">
                                            <label class="contact__form--label" for="message">Write Your Message <span class="contact__form--label__star">*</span></label>
                                            <textarea class="contact__form--textarea" name="message" id="message" placeholder="Write Your Message">{{old('message')}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="contact__form--btn primary__btn" type="submit">Submit Now</button>  
                                <p class="form-messege"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End contact section -->

    <!-- Start contact map area -->
    <div class="contact__map--area section--padding pt-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.1114262192445!2d77.06597767624918!3d28.626422375668177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d05e29093ce79%3A0x18830a0a1714b442!2sInsta%20Bizmart%20%7C%20Website%20Designing%20Company%20%7C%20Website%20Development%20%7C%20Digital%20Marketing%20Company!5e0!3m2!1sen!2sin!4v1692038239166!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!-- End contact map area -->

   <!-- Start Newsletter banner section -->
    <section class="newsletter__banner--section section--padding pt-0">
        <div class="container">
            <div class="newsletter__banner--thumbnail position__relative">
                <img class="newsletter__banner--thumbnail__img" src="{{url('assets/frontend/img/banner/banner-bg7.webp')}}" alt="newsletter-banner">
                <div class="newsletter__content newsletter__subscribe">
                    <h5 class="newsletter__content--subtitle text-white">Want to offer regularly ?</h5>
                    <h2 class="newsletter__content--title text-white h3 mb-25">Subscribe Our Newsletter <br>
                        for Get Daily Update</h2>
                    <form class="newsletter__subscribe--form position__relative" action="#">
                        <label>
                            <input class="newsletter__subscribe--input" placeholder="Enter your email address" type="email">
                        </label>
                        <button class="newsletter__subscribe--button primary__btn" type="submit">Subscribe
                            <svg class="newsletter__subscribe--button__icon" xmlns="http://www.w3.org/2000/svg" width="9.159" height="7.85" viewBox="0 0 9.159 7.85">
                                <path  data-name="Icon material-send" d="M3,12.35l9.154-3.925L3,4.5,3,7.553l6.542.872L3,9.3Z" transform="translate(-3 -4.5)" fill="currentColor"/>
                            </svg>
                        </button>
                    </form>   
                </div>
            </div>
        </div>
    </section>
    <!-- End Newsletter banner section -->

</main>
@stop
@push('scripts')
<script>
</script>
@endpush