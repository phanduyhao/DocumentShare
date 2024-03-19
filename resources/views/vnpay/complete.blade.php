@extends('layout.layout')
@section('content')
    <div class="container site-cart__wrapper">
        <div class="link flex">
            <p>Home</p>
            <img
                src="{{ asset('fontend') }}/images/tron.svg"
                alt="link"
                srcset=""
            />
            <p>Carts</p>
        </div>
        <div class="checkout">
            <div class="checkout-part flex-center">
                <h3>1.SHOPPING CART</h3>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <h3 class="check">2.CHECKOUT</h3>
                <i class="fa fa-angle-right" aria-hidden="true"></i>
                <h3 class="complete">3.ORDER COMPLETE</h3>
            </div>
        </div>
        <div class="success">
            <div class="success-wrap flex-center">
                <div class="success-wrap__item flex">
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                    <div>
                        <h3>THANK YOU!</h3>
                        <p>Your order has been received</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="table flex-center-between">
            <div class="table-item flex-derection">
                <p>Order number:</p>
                <p>{{ $checkout->order_code }}</p>
            </div>
            <div class="table-item flex-derection">
                <p>Status:</p>
                <p>Processing</p>
            </div>
            <div class="table-item flex-derection">
                <p>Date:</p>
                <p>{{ $checkout->created_at }}</p>
            </div>
            <div class="table-item flex-derection">
                <p>Payment Method:</p>
                <p>
                    {{ $checkout->Payment_method == 1 ? 'Cash on delivery' : 'Banking' }}
                </p>
            </div>
        </div>
    </div>

@endsection
