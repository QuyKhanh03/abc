@extends('client.layouts.master')
@section('main-content')
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="shop spad">
    <div class="container">
        <div class="row">
           @include('client.layouts.partials.shop-slidebar')
            <div class="col-lg-9">
                <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–12 of 126 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Sort by Price:</p>
                                <select style="display: none;">
                                    <option value="">Low To High</option>
                                    <option value="">$0 - $55</option>
                                    <option value="">$55 - $100</option>
                                </select><div class="nice-select" tabindex="0"><span class="current">Low To High</span><ul class="list"><li data-value="" class="option selected">Low To High</li><li data-value="" class="option">$0 - $55</li><li data-value="" class="option">$55 - $100</li></ul></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $key => $value)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/'.$value->images)  }}" style="background-image: url({{ asset('storage/'.$value->images)  }});">
                                <ul class="product__hover">
                                    <li><a href="{{ route('client.product',$value->id) }}"><img src="/clients/img/icon/heart.png" alt=""></a></li>
                                    <li><a href="{{ route('client.product',$value->id) }}"><img src="/clients/img/icon/search.png" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>
                                    {{ $value->pro_name }}
                                </h6>
                                <a href="javascript:void(0)" data-id="{{ $value->id }}" class="add-cart">+ Add To Cart</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <h5>
                                    {{ number_format($value->price) }} VND
                                </h5>
                                <div class="product__color__select">
                                    <label for="pc-10">
                                        <input type="radio" id="pc-10">
                                    </label>
                                    <label class="active black" for="pc-11">
                                        <input type="radio" id="pc-11">
                                    </label>
                                    <label class="grey" for="pc-12">
                                        <input type="radio" id="pc-12">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        @include('components.pagination', ['paginator' => $products])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@push('script')
    <script>
        $(document).ready(function(){
            $('.add-cart').click(function(){
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('client.cart.add') }}",
                    method: "POST",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data){
                        if(data.status === 200){
                            //.wrapper-loading
                            $('.wrapper-loading').show();
                            setTimeout(function(){
                                $('.wrapper-loading').hide();

                            }, 2000);
                        }
                    }
                });
            });
        });
    </script>
@endpush
