@extends('client.layouts.master');
@section('main-content')
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                            <tr>--}}
                            {{--                                <td class="product__cart__item">--}}
                            {{--                                    <div class="product__cart__item__pic">--}}
                            {{--                                        <img src="/clients/img/shopping-cart/cart-1.jpg" alt="">--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="product__cart__item__text">--}}
                            {{--                                        <h6>T-shirt Contrast Pocket</h6>--}}
                            {{--                                        <h5>$98.49</h5>--}}
                            {{--                                    </div>--}}
                            {{--                                </td>--}}
                            {{--                                <td class="quantity__item">--}}
                            {{--                                    <div class="quantity">--}}
                            {{--                                        <div class="pro-qty-2">--}}
                            {{--                                            <input type="text" value="1">--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </td>--}}
                            {{--                                <td class="cart__price">$ 30.00</td>--}}
                            {{--                                <td class="cart__close"><i class="fa fa-close"></i></td>--}}
                            {{--                            </tr>--}}
                            @if(session('cart'))
                                @php
                                    $cart = session()->get('cart');
                                @endphp
                                @foreach($cart as $key => $value)
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="{{ asset('storage/'.$value['photo']) }}" alt="">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6>{{ $value['name'] }}</h6>
                                                <h5>{{ number_format($value['price'], 2) }}</h5>
                                            </div>
                                        </td>
                                        <td class="quantity__item">
                                            <div class="quantity">
                                                <div class="pro-qty-2">
                                                    <input type="number" value="{{ $value['quantity'] }}" data-id="{{ $key }}" class="quantity-input">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__price">{{ number_format($value['price'] * $value['quantity']) }} VND</td>
                                        <td class="cart__close">
                                            <a href="javascript:void(0)" class="remove-cart" data-id="{{ $key }}">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>$ 169.50</span></li>
                            <li>Total <span>$ 169.50</span></li>
                        </ul>
                        <a href="#" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.remove-cart').click(function () {
                let id = $(this).data('id');
                $.ajax({
                    url: '{{ route('client.remove.cart') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.status === 200) {
                            window.location.reload();
                        }
                    }
                });
            });

            $('.quantity-input').change(function () {
                let id = $(this).data('id');
                let quantity = $(this).val();
                $.ajax({
                    url: '{{ route('client.update.cart') }}',
                    type: 'POST',
                    data: {
                        id: id,
                        quantity: quantity,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (data) {
                        if (data.status === 200) {
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endpush
