<div class="main-content-area">
    <!-- Livewire loading indicator -->
    {{-- <x-loading-star /> --}}

    @if(count($cart) > 0)
    <h3 class="box-title">상품목록</h3>
    <ul class="products-cart">
        @foreach($cart as $item)
            <li class="pr-cart-item flex items-center">
                <div class="product-image  w-64">
                    <figure>
                        <img src="{{ asset($item->image) }}">
                    </figure>
                </div>
                <div class="product-nam  flex-1">
                    <a class="link-to-product" href="/shop/detail/{{$item->product_id}}">
                        {{$item->product}}
                    </a>
                </div>
                <div class="price-field produtc-price  w-32">
                    <p class="price">${{$item->price}}</p>
                </div>
                <div class="quantity  w-32">

                    <div class="quantity-input">

                        <a class="btn btn-increase" href="#"
                        wire:click="increaseQuantity('{{$item->id}}')">
                        +
                        </a>

                        <input type="text" name="product-quatity" value="{{$item->quantity}}" data-max="120" pattern="[0-9]*" >

                        <a class="btn btn-reduce" href="#"
                        wire:click="decreaseQuantity('{{$item->id}}')">
                        -
                        </a>
                    </div>

                    {{--
                    <p class="text-center">
                        <a href="#" wire:click.prevent="switchToSaveForLater('{{$item->rowId}}')">Save For Later</a>
                    </p>
                    --}}
                </div>

                <div class="price-field sub-total   w-32">
                    <p class="price">{{$item->price * $item->quantity }}</p>
                </div>

                <div class="delete   w-32">
                    <a href="#" class="btn btn-delete" title="" wire:click="destroy('{{$item->id}}')">
                        <span>Delete from your cart</span>
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </a>
                </div>
            </li>

        @endforeach

        <div>
            <a class="btn btn-clear" href="#" wire:click="confirmDeleteAll">Clear Shopping Cart</a>
            <a class="btn btn-update" href="#">Update Shopping Cart</a>
        </div>
    </ul>
    @else
    <div class="text-center" style="padding: 30px 0;">
        <p>상품을 장바구니에 담아 주세요.</p>
        <a href="/shop">쇼핑하기 이동</a>
    </div>
    @endif


    <x-wire-dialog-modal maxWidth="4xl" wire:model="popupConfirmDelete">
        <x-slot name="title">
            {{ __('장바구니 삭제') }}
        </x-slot>
        <x-slot name="content">
            장바구니에 있는 모든 상품을 삭제 할까요?

            <x-btn-danger wire:click="destroyAll">예, 삭제합니다.</x-btn-danger>

        </x-slot>
        <x-slot name="footer">

            <x-btn-primary wire:click="popupClose">닫기</x-btn-primary>
        </x-slot>
    </x-wire-dialog-modal>




    {{--
    @if(Cart::instance('cart')->count() >0)

        <div class="wrap-iten-in-cart">
            @if(Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{Session::get('success_message')}}
                </div>
            @endif

            @if(Cart::instance('cart')->count() >0)
            <h3 class="box-title">Products Name</h3>
            <ul class="products-cart">
                @foreach(Cart::instance('cart')->content() as $item)

                @endforeach

            </ul>
            @else
            <p>No item</p>
            @endif
        </div>

        <div class="summary">
            <div class="order-summary">
                <h4 class="title-box">Order Summary</h4>
                <p class="summary-info">
                    <span class="title">Subtotal</span>
                    <b class="index">${{ CART::instance('cart')->subtotal() }}</b>
                </p>
                @if(Session::has('coupon'))
                    <p class="summary-info">
                        <span class="title">Discount {{Session::has('coupon')['code']}}</span>
                        <b class="index">${{number_format($discount,2)}}</b>

                        <a href="#" wire:click.prevent="removeCoupon">Del</a>
                    </p>
                    <p class="summary-info"><span class="title">Tax({{config('cart.tax')}}%)</span>
                        <b class="index">${{$taxAfterDiscount}}</b>
                    </p>
                    <p class="summary-info"><span class="title">Subtotal with Discount</span>
                        <b class="index">${{$subtotalAfterDiscount}}</b>
                    </p>
                    <p class="summary-info total-info ">
                        <span class="title">Total</span>
                        <b class="index">${{$totalAfterDiscount}}</b>
                    </p>
                @else
                    <p class="summary-info"><span class="title">Tax</span><b class="index">${{ CART::instance('cart')->tax() }}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info ">
                        <span class="title">Total</span>
                        <b class="index">${{ CART::instance('cart')->total() }}</b>
                    </p>
                @endif
            </div>

            <div class="checkout-info">
                @if(!Session::has('coupon'))
                    <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox" wire:model="haveCouponCode">
                        <span>I have coupons code</span>
                    </label>
                    @if($haveCouponCode == 1)
                        <div class="summary-item">
                            <form wire:submit.prevent="applyCouponCode">
                                <h4 class="title-box">Coupon Code</h4>
                                @if(Session::has('coupon_message'))
                                    <div class="alert alert-danger">{{Session::get('coupon_message')}}</div>
                                @endif
                                <p class="row-in-form">
                                    <label for="coupon-code">쿠폰 코드를 입력해 주세요:</label>
                                    <input type="text" name="coupon-code" wire:model="couponCode">
                                </p>
                                <button type="submit" class="btn btn-small">적용</button>
                            </form>
                        </div>
                    @endif
                @endif

                <!-- 주문 checkout -->
                <a class="btn btn-checkout" href="#" wire:click.prevent="checkout">
                    Check out
                </a>

                <a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
            </div>

        </div>
    @else

    @endif



    <div class="wrap-iten-in-cart">
        <h3 class="title" style="border-bottom: 1px solid;padding-bottom:15px ">{{Cart::instance('saveForLater')->count()}} items(s) Save For Later</h3>
        @if(Session::has('success_message'))
            <div class="alert alert-success">
                <strong>Success</strong> {{Session::get('success_message')}}
            </div>
        @endif

        @if(Cart::instance('saveForLater')->count() >0)
        <h3 class="box-title">Products Name</h3>
        <ul class="products-cart">
            @foreach(Cart::instance('saveForLater')->content() as $item)
            <li class="pr-cart-item">
                <div class="product-image">
                    <figure>
                        <img src="{{ asset('assets/shop/templates/images/products') }}/{{$item->model->image}}" alt="">
                    </figure>
                </div>
                <div class="product-name">
                    <a class="link-to-product" href="/shop/detail/{{$item->model->slug}}">{{$item->model->name}}</a>
                </div>
                <div class="price-field produtc-price"><p class="price">${{$item->model->regular_price}}</p></div>
                <div class="quantity">

                    <p class="text-center">
                        <a href="#" wire:click.prevent="moveToCart('{{$item->rowId}}')">Move to Cart</a>
                    </p>
                </div>

                <div class="delete">
                    <a href="#" class="btn btn-delete" title="" wire:click.prevent="deleteFromSaveForLater('{{$item->rowId}}')">
                        <span>Delete from your save for later</span>
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </a>
                </div>
            </li>
            @endforeach

        </ul>
        @else
        <p>No item save for later</p>
        @endif
    </div>
    --}}



</div>
<!--end main content area-->
