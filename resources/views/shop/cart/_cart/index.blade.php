<x-www-layout>
    <!-- breadcrumb -->
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link">
                    <a href="/shop" class="link">home</a>
                </li>
                <li class="item-link">
                    <span>Cart</span>
                </li>
            </ul>
        </div>
    </div>

    <!--main area-->
    <main id="main" class="main-site">
        <div class="container">
            CartIdx: {{$cartidx}} / {{$cart_status}}
        </div>


        <div class="container">
            @livewire('ShopCart',['cartidx'=>$cartidx])
        </div>



        {{-- 가장 많이본 제품 --}}
        {{--
        <div class="container">
            @livewire('ShopMostViewProducts')
        </div>
        --}}
        <!--end container-->
    </main>
    <!--main area-->
</x-www-layout>
