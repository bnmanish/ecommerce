<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>#{{$order->order_no}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">Karima Williams</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    KarimaWilliams (KarimaWilliams.com) ,<br>
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
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Full Name:</td>
                <td>{{$order->address->name}}</td>
                <td>Email Id:</td>
                <td>{{$order->address->email}}</td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td>{{Auth::user()->mobile}}</td>
                <td>Tracking Id/No.:</td>
                <td>#{{$order->order_no}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{date('d M Y',strtotime($order->created_at))}}</td>
                <td>Address:</td>
                <td>
                    {{$order->address->name}}, {{$order->address->address1}}, {{$order->address->address1}}, {{$order->address->city}}, {{$order->address->state}}, {{$order->address->country}}<br>
                </td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{$order->status == 2 ? 'Paid' : 'Unpaid'}}</td>

                <td>Pin code:</td>
                <td>{{$order->address->pincode}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
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
            <tr>
                <td>Sub Total :</td>
                <td>{{currency('dollar')}} {{number_format($subTotal,2)}}</td>
            </tr>
            <tr>
                <td>Taxes :</td>
                <td>{{currency('dollar')}} {{$order->taxes}}</td>
            </tr>
            <tr>
                <td>Shipping Charges :</td>
                <td>{{currency('dollar')}} {{$order->shipping_charges}}</td>
            </tr>
            <!-- <tr>
                <td>Discount :</td>
                <td>$ {{$order->discount}}</td>
            </tr> -->
            <tr>
                <td>Total :</td>
                <td>{{currency('dollar')}} {{number_format(($subTotal +$order->taxes + $order->shipping_charges - $order->discount),2)}}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center">
        Thank your for shopping with Karima Williams
    </p>

</body>
</html>