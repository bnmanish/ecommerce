<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Timy Shop - Order Invoice</title>
    <meta name="author" content="themeholy">
    <meta name="description" content="Invar - Invoice HTML Template">
    <meta name="keywords" content="Invar - Invoice HTML Template" />
    <meta name="robots" content="INDEX,FOLLOW">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('uploads/setting/'.@settings()->site_logo)}}">
    <link rel="manifest" href="{{url('/')}}/assets/invoice/img/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{url('/')}}/assets/invoice/img/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!--============================== Google Fonts ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet">
    <!--============================== All CSS File	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{url('/')}}/assets/invoice/css/bootstrap.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{url('/')}}/assets/invoice/css/style.css">

</head>

<body class="restaurant-template">
    <div class="invoice-container-wrap">
        <div class="invoice-container">
            <main>
                <!--============================== Invoice Area ==============================-->
                <div class="th-invoice invoice_style1">
                    <div class="download-inner" id="download_section">
                        <!--============================== Header Area ==============================-->
                        <header class="th-header header-layout1">
                            <!-- <div class="logo-shape">
                                <svg width="365" height="128" viewBox="0 0 365 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M365 128H0L104.831 0H365V128Z" fill="#EE1C25" />
                                </svg>
                            </div> -->
                            <div class="right-shape">
                                <svg width="482" height="100" viewBox="0 0 482 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M77.7084 0L0 100H482V0H77.7084Z" fill="url(#paint0_linear_307_1954)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_307_1954" x1="240.998" y1="99.999" x2="240.998" y2="-0.00454799" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#21171F" />
                                            <stop offset="1" stop-color="#3E4049" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <div class="left-shape">
                                <svg width="387" height="100" viewBox="0 0 387 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0V100H304.237L387 0H0Z" fill="#EE1C25" />
                                </svg>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <div class="header-logo">
                                        <a href="{{route('home')}}"><img src="{{url('uploads/setting/'.@settings()->site_logo)}}" alt="TimyShop"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="header-bottom">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <h1 class="big-title">Invoice</h1>
                                    </div>
                                    <div class="col-auto">
                                        <p class="invoice-number"><b>Order No : </b>#{{$order->order_no}}</p>
                                        <p class="invoice-date"><b>Date: </b>{{date('d M Y',strtotime($order->created_at))}}</p>
                                        <p class="invoice-date"><b>Order Status: </b>{{$order->status == 2 ? 'Paid' : 'Unpaid'}}</p>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="row justify-content-between mb-30">
                            <div class="col">
                                <div class="invoice-left">
                                    <b>Buyer Address : </b>
                                    <address>
                                        {{$order->address->name}} ,<br>
                                        {{$order->address->address1}} {{$order->address->address1}} {{$order->address->city}}<br>
                                        {{$order->address->state}} {{$order->address->country}} {{$order->address->pincode}}<br>
                                        Email : {{$order->address->email}}<br>
                                        
                                    </address>
                                </div>
                            </div>
                            <div class="col">
                                <div class="invoice-right">
                                    <b>Seller Address : </b>
                                    <address>
                                        TimyShop (timyshop.com) ,<br>
                                        @if(@settings()->primary_address)
                                            {!!settings()->primary_address!!}
                                        @else
                                            @if(@settings()->primary_address)
                                                {!!settings()->primary_address!!}
                                            @endif
                                        @endif
                                        <br>
                                        @if(@settings()->primary_email)
                                            Emil : {{@settings()->primary_email}}
                                        @else
                                            @if(@settings()->secondary_email)
                                                Emil : {{@settings()->secondary_email}}
                                            @endif
                                        @endif
                                    </address>
                                </div>
                            </div>
                        </div>
                        <table class="invoice-table td-big">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Item Description</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subTotal = 0; @endphp
                                @foreach($order->details as $key => $orderItem)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{$orderItem->product->title}}</td>
                                    <td>{{currency('dollar')}} {{number_format($orderItem->unit_price,2)}}</td>
                                    <td>{{$orderItem->quantity}}</td>
                                    <td>{{currency('dollar')}} {{number_format($orderItem->total_price,2)}}</td>
                                    @php $subTotal += $orderItem->total_price; @endphp
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row justify-content-between">
                            <div class="col-auto">
                                <!-- <div class="invoice-left">
                                    <b>Terms & Conditions</b>
                                    <p class="mb-0">Authoritatively envisioned business <br> action items through parallel.</p>
                                </div> -->
                                <div class="invoice-note2 mt-25">
                                    <p class="mb-0"><b>NOTE:</b> This is computer generated receipt and <br> does not require physical signature.</p>
                                </div>
                            </div>
                            <div class="col-auto">
                                <table class="total-table">
                                    <tr>
                                        <th>Sub Total :</th>
                                        <td>{{currency('dollar')}} {{number_format($subTotal,2)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Taxes :</th>
                                        <td>{{currency('dollar')}} {{$order->taxes}}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping Charges :</th>
                                        <td>{{currency('dollar')}} {{$order->shipping_charges}}</td>
                                    </tr>
                                    <!-- <tr>
                                        <th>Discount :</th>
                                        <td>$ {{$order->discount}}</td>
                                    </tr> -->
                                    <tr>
                                        <th>Total :</th>
                                        <td>{{currency('dollar')}} {{number_format(($subTotal +$order->taxes + $order->shipping_charges - $order->discount),2)}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="body-shape1">
                            <img src="{{url('/')}}/assets/invoice/img/template/restaurant_block.svg" alt="shape">
                        </div>
                    </div>
                    <div class="invoice-buttons">
                        <button class="print_btn">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.25 13C16.6146 13 16.9141 13.1172 17.1484 13.3516C17.3828 13.5859 17.5 13.8854 17.5 14.25V19.25C17.5 19.6146 17.3828 19.9141 17.1484 20.1484C16.9141 20.3828 16.6146 20.5 16.25 20.5H3.75C3.38542 20.5 3.08594 20.3828 2.85156 20.1484C2.61719 19.9141 2.5 19.6146 2.5 19.25V14.25C2.5 13.8854 2.61719 13.5859 2.85156 13.3516C3.08594 13.1172 3.38542 13 3.75 13H16.25ZM16.25 19.25V14.25H3.75V19.25H16.25ZM17.5 8C18.2031 8.02604 18.7891 8.27344 19.2578 8.74219C19.7266 9.21094 19.974 9.79688 20 10.5V14.875C19.974 15.2656 19.7656 15.474 19.375 15.5C18.9844 15.474 18.776 15.2656 18.75 14.875V10.5C18.75 10.1354 18.6328 9.83594 18.3984 9.60156C18.1641 9.36719 17.8646 9.25 17.5 9.25H2.5C2.13542 9.25 1.83594 9.36719 1.60156 9.60156C1.36719 9.83594 1.25 10.1354 1.25 10.5V14.875C1.22396 15.2656 1.01562 15.474 0.625 15.5C0.234375 15.474 0.0260417 15.2656 0 14.875V10.5C0.0260417 9.79688 0.273438 9.21094 0.742188 8.74219C1.21094 8.27344 1.79688 8.02604 2.5 8V3C2.52604 2.29688 2.77344 1.71094 3.24219 1.24219C3.71094 0.773438 4.29688 0.526042 5 0.5H14.7266C15.0651 0.5 15.3646 0.617188 15.625 0.851562L17.1484 2.375C17.3828 2.60938 17.5 2.90885 17.5 3.27344V8ZM16.25 8V3.27344L14.7266 1.75H5C4.63542 1.75 4.33594 1.86719 4.10156 2.10156C3.86719 2.33594 3.75 2.63542 3.75 3V8H16.25ZM16.875 10.1875C17.4479 10.2396 17.7604 10.5521 17.8125 11.125C17.7604 11.6979 17.4479 12.0104 16.875 12.0625C16.3021 12.0104 15.9896 11.6979 15.9375 11.125C15.9896 10.5521 16.3021 10.2396 16.875 10.1875Z" fill="#111111" />
                            </svg>
                        </button>
                        <button id="download_btn" class="download_btn">
                            <svg width="25" height="19" viewBox="0 0 25 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.94531 11.1797C8.6849 10.8932 8.6849 10.6068 8.94531 10.3203C9.23177 10.0599 9.51823 10.0599 9.80469 10.3203L11.875 12.3516V6.375C11.901 5.98438 12.1094 5.77604 12.5 5.75C12.8906 5.77604 13.099 5.98438 13.125 6.375V12.3516L15.1953 10.3203C15.4818 10.0599 15.7682 10.0599 16.0547 10.3203C16.3151 10.6068 16.3151 10.8932 16.0547 11.1797L12.9297 14.3047C12.6432 14.5651 12.3568 14.5651 12.0703 14.3047L8.94531 11.1797ZM10.625 0.75C11.7969 0.75 12.8646 1.01042 13.8281 1.53125C14.8177 2.05208 15.625 2.76823 16.25 3.67969C16.8229 3.39323 17.4479 3.25 18.125 3.25C19.375 3.27604 20.4036 3.70573 21.2109 4.53906C22.0443 5.34635 22.474 6.375 22.5 7.625C22.5 8.01562 22.4479 8.41927 22.3438 8.83594C23.151 9.2526 23.7891 9.85156 24.2578 10.6328C24.7526 11.4141 25 12.2865 25 13.25C24.974 14.6562 24.4922 15.8411 23.5547 16.8047C22.5911 17.7422 21.4062 18.224 20 18.25H5.625C4.03646 18.1979 2.70833 17.651 1.64062 16.6094C0.598958 15.5417 0.0520833 14.2135 0 12.625C0.0260417 11.375 0.377604 10.2812 1.05469 9.34375C1.73177 8.40625 2.63021 7.72917 3.75 7.3125C3.88021 5.4375 4.58333 3.88802 5.85938 2.66406C7.13542 1.4401 8.72396 0.802083 10.625 0.75ZM10.625 2C9.08854 2.02604 7.78646 2.54688 6.71875 3.5625C5.67708 4.57812 5.10417 5.85417 5 7.39062C4.94792 7.91146 4.67448 8.27604 4.17969 8.48438C3.29427 8.79688 2.59115 9.33073 2.07031 10.0859C1.54948 10.8151 1.27604 11.6615 1.25 12.625C1.27604 13.875 1.70573 14.9036 2.53906 15.7109C3.34635 16.5443 4.375 16.974 5.625 17H20C21.0677 16.974 21.9531 16.6094 22.6562 15.9062C23.3594 15.2031 23.724 14.3177 23.75 13.25C23.75 12.5208 23.5677 11.8698 23.2031 11.2969C22.8385 10.724 22.3568 10.2682 21.7578 9.92969C21.2109 9.59115 21.0026 9.09635 21.1328 8.44531C21.2109 8.21094 21.25 7.9375 21.25 7.625C21.224 6.73958 20.9245 5.9974 20.3516 5.39844C19.7526 4.82552 19.0104 4.52604 18.125 4.5C17.6302 4.5 17.1875 4.60417 16.7969 4.8125C16.1719 5.04688 15.651 4.90365 15.2344 4.38281C14.7135 3.65365 14.0495 3.08073 13.2422 2.66406C12.4609 2.22135 11.5885 2 10.625 2Z" fill="white" />
                            </svg>
                        </button>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Invoice Conainter End -->
    <!--============================== All Js File ============================== -->
    <!-- Jquery -->
    <script src="{{url('/')}}/assets/invoice/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{url('/')}}/assets/invoice/js/bootstrap.min.js"></script>
    <!-- PDF Generator -->
    <script src="{{url('/')}}/assets/invoice/js/jspdf.min.js"></script>
    <script src="{{url('/')}}/assets/invoice/js/html2canvas.min.js"></script>
    <!-- Main Js File -->
    <script src="{{url('/')}}/assets/invoice/js/main.js"></script>
</body>

</html>