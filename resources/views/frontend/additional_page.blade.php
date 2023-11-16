@extends('frontend/layouts/main')
@section('title', $page->meta_title)
@section('keywords', $page->meta_keywords)
@section('description', $page->meta_description)
@section('content')
<main class="main__content_wrapper">
    
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content">
                        <h1 class="breadcrumb__content--title text-white mb-10">{{$page->title}}</h1>
                        <ul class="breadcrumb__content--menu d-flex">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">{{$page->title}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start about section -->
    <section class="about__section section--padding mb-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-justify">
                    {!!$page->description!!}
                </div>
            </div>
        </div>
    </section>
    <!-- End about section -->

    <!-- Start testimonial section -->
    <section class="testimonial__section position__relative testimonial__bg--two section--padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="testimonial__section--inner">
                        <div class="section__heading text-center mb-40">
                            <h2 class="section__heading--maintitle">What Say Our Top Clints</h2>
                        </div>
                        <div class=" testimonial__swiper--column3 testimonial__padding swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                        <div class="testimonial__thumbnail--style2">
                                            <img class="testimonial__items--thumbnail__img display-block" src="{{url('assets/frontend/img/other/testimonial-thumb1.webp')}}" alt="testimonial-img">
                                        </div>
                                        <div class="testimonial__content--style2">
                                            <h3 class="testimonial__items--author__title h4">Abdur Razzak</h3>
                                            <h4 class="testimonial__items--author__subtitle h5">Ui Ux Designer</h4> 
                                            <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                              </svg>
                                                Mum ut perspiciatis unde omnis 
                                                iste natus error sit voluptatem
                                                accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                    <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                  </svg>
                                            </p>
                                            <ul class="rating testimonial__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>   
                                        </div>
                                        <div class="testimonial__quote--icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                  <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                  <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                        <div class="testimonial__thumbnail--style2">
                                            <img class="testimonial__items--thumbnail__img display-block" src="{{url('assets/frontend/img/other/testimonial-thumb2.webp')}}" alt="testimonial-img">
                                        </div>
                                        <div class="testimonial__content--style2">
                                            <h3 class="testimonial__items--author__title h4">Hamid Khalid</h3>
                                            <h4 class="testimonial__items--author__subtitle h5">Web Designer</h4> 
                                            <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                              </svg>
                                                Mum ut perspiciatis unde omnis 
                                                iste natus error sit voluptatem
                                                accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                    <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                  </svg>
                                            </p>
                                            <ul class="rating testimonial__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>   
                                        </div>
                                        <div class="testimonial__quote--icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                  <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                  <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                        <div class="testimonial__thumbnail--style2">
                                            <img class="testimonial__items--thumbnail__img display-block" src="{{url('assets/frontend/img/other/testimonial-thumb3.webp')}}" alt="testimonial-img">
                                        </div>
                                        <div class="testimonial__content--style2">
                                            <h3 class="testimonial__items--author__title h4">Sohidul Alam</h3>
                                            <h4 class="testimonial__items--author__subtitle h5">CEO Peque Theme</h4> 
                                            <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                              </svg>
                                                Mum ut perspiciatis unde omnis 
                                                iste natus error sit voluptatem
                                                accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                    <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                  </svg>
                                            </p>
                                            <ul class="rating testimonial__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>   
                                        </div>
                                        <div class="testimonial__quote--icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                  <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                  <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial__items--style2 position__relative border-radius-5 d-flex align-items-center">
                                        <div class="testimonial__thumbnail--style2">
                                            <img class="testimonial__items--thumbnail__img display-block" src="{{url('assets/frontend/img/other/testimonial-thumb1.webp')}}" alt="testimonial-img">
                                        </div>
                                        <div class="testimonial__content--style2">
                                            <h3 class="testimonial__items--author__title h4">Abdur Razzak</h3>
                                            <h4 class="testimonial__items--author__subtitle h5">Ui Ux Designer</h4> 
                                            <p class="testimonial__items--desc style2"><svg xmlns="http://www.w3.org/2000/svg" width="8.101" height="6.481" viewBox="0 0 8.101 6.481">
                                                <path  data-name="Icon metro-quote" d="M5.57,9.667v3.24H8.81V9.667H7.19a1.587,1.587,0,0,1,1.62-1.62V6.427A3.174,3.174,0,0,0,5.57,9.667Zm8.1-1.62V6.427a3.174,3.174,0,0,0-3.24,3.24v3.24h3.24V9.667h-1.62A1.587,1.587,0,0,1,13.671,8.047Z" transform="translate(-5.57 -6.427)" fill="currentColor"/>
                                              </svg>
                                                Mum ut perspiciatis unde omnis 
                                                iste natus error sit voluptatem
                                                accusan tium doloremque. <svg xmlns="http://www.w3.org/2000/svg" width="7.774" height="6.803" viewBox="0 0 7.774 6.803">
                                                    <path  data-name="Icon awesome-quote-right" d="M7.046,1.5H5.1a.729.729,0,0,0-.729.729V4.172A.729.729,0,0,0,5.1,4.9H6.317v.972a.973.973,0,0,1-.972.972H5.223a.364.364,0,0,0-.364.364v.729a.364.364,0,0,0,.364.364h.121a2.429,2.429,0,0,0,2.43-2.43V2.229A.729.729,0,0,0,7.046,1.5Zm-4.373,0H.729A.729.729,0,0,0,0,2.229V4.172A.729.729,0,0,0,.729,4.9H1.944v.972a.973.973,0,0,1-.972.972H.85a.364.364,0,0,0-.364.364v.729A.364.364,0,0,0,.85,8.3H.972A2.429,2.429,0,0,0,3.4,5.873V2.229A.729.729,0,0,0,2.672,1.5Z" transform="translate(0 -1.5)" fill="currentColor"/>
                                                  </svg>
                                            </p>
                                            <ul class="rating testimonial__rating d-flex">
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                                <li class="rating__list">
                                                    <span class="rating__list--icon">
                                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="11.105" height="11.732" viewBox="0 0 10.105 9.732">
                                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                </li>
                                            </ul>   
                                        </div>
                                        <div class="testimonial__quote--icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25.599" height="22.572" viewBox="0 0 25.599 22.572">
                                                <g  data-name="Group 382" transform="translate(-164 -5399)">
                                                  <path  data-name="Path 131" d="M10.284,11.81a1.231,1.231,0,0,0,.62-1.652L9.892,8.031a1.235,1.235,0,0,0-1.611-.6A14.227,14.227,0,0,0,3.82,10.324,10.79,10.79,0,0,0,.826,15.052,25.936,25.936,0,0,0,0,22.321v6.34A1.243,1.243,0,0,0,1.239,29.9H9.355a1.243,1.243,0,0,0,1.239-1.239V20.545a1.243,1.243,0,0,0-1.239-1.239H5.472a8.707,8.707,0,0,1,1.446-5.018A7.849,7.849,0,0,1,10.284,11.81Z" transform="translate(164 5391.672)" fill="#f1f1f1"/>
                                                  <path  data-name="Path 132" d="M80.963,11.89a1.231,1.231,0,0,0,.62-1.652L80.571,8.132a1.235,1.235,0,0,0-1.611-.6,14.959,14.959,0,0,0-4.44,2.87,11.021,11.021,0,0,0-3.015,4.75A25.587,25.587,0,0,0,70.7,22.4v6.34a1.243,1.243,0,0,0,1.239,1.239h8.116a1.243,1.243,0,0,0,1.239-1.239V20.625a1.243,1.243,0,0,0-1.239-1.239h-3.9A8.709,8.709,0,0,1,77.6,14.368,7.848,7.848,0,0,1,80.963,11.89Z" transform="translate(107.9 5391.592)" fill="#f1f1f1"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial__pagination swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="testimonial__bg--shape1" src="{{url('assets/frontend/img/other/testimonial-shape.webp')}}" alt="">
        <img class="testimonial__bg--shape2" src="{{url('assets/frontend/img/other/testimonial-shape2.webp')}}" alt="">
    </section>
    <!-- End testimonial section -->

    <!-- Start Newsletter banner section -->
    <section class="newsletter__banner--section section--padding">
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

    <!-- Start brand logo section -->
    <div class="brand__logo--section bg__secondary section--padding">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="brand__logo--section__inner d-flex justify-content-center align-items-center">
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img" src="{{url('assets/frontend/img/logo/brand-logo1.webp')}}" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img" src="{{url('assets/frontend/img/logo/brand-logo2.webp')}}" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img" src="{{url('assets/frontend/img/logo/brand-logo3.webp')}}" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img" src="{{url('assets/frontend/img/logo/brand-logo4.webp')}}" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img" src="{{url('assets/frontend/img/logo/brand-logo5.webp')}}" alt="brand logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End brand logo section -->
</main>
@stop
@push('scripts')
<script>
</script>
@endpush