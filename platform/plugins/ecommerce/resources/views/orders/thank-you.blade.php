@extends('plugins/ecommerce::orders.master')
@section('title')
    {{ __('Order successfully. Order number :id', ['id' => $order->code]) }}
@stop
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-12 left">
                @include('plugins/ecommerce::orders.partials.logo')

                <div class="thank-you">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                    <div class="d-inline-block">
                        <h3 class="thank-you-sentence">
                            {{ __('Your order is successfully placed') }}
                        </h3>
                        <p>{{ __('Thank you for purchasing our products!') }}</p>
                    </div>
                </div>

                @include('plugins/ecommerce::orders.thank-you.customer-info', compact('order'))

               
 {{ __('الرجاء ارسال صورة المنتج على الواتس اب') }} 
 <a href="https://api.whatsapp.com/send?phone=905319848138" style="display: table; font-family: sans-serif; text-decoration: none; margin: 1em auto; color: #fff; font-size: 0.9em; padding: 1em 2em 1em 3.5em; border-radius: 2em; font-weight: bold; background: #25d366 url('https://tochat.be/click-to-chat-directory/css/whatsapp.svg') no-repeat 1.5em center; background-size: 1.6em;"> تواصل معنا</a>
            </div>
            <div class="col-lg-5 col-md-6 d-none d-md-block right">

                @include('plugins/ecommerce::orders.thank-you.order-info')

                <hr>

                @include('plugins/ecommerce::orders.thank-you.total-info', ['order' => $order])
            </div>
        </div>
    </div>
@stop
