<x-theme theme="shop.templates">
    <x-theme-layout>
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
            </ul>
        </div>

        <main>
            <h2 class="font-bold text-3xl" style="padding-bottom:2px; border-bottom: 2px solid #bbbbbb">주문상품</h2>
            <div class="mb-4">
                @livewire('WidgetShopCheckoutProducts',['orderidx'=>$orderidx])

                {{-- 쿠폰위젯 --}}
                @livewire('WidgetShopCheckoutCoupon',['orderidx'=>$orderidx])
            </div>


            <div class="flex justify-between items-start space-x-8">
                <div class="flex-1">

                    <h2 class="font-bold text-3xl" style="padding-bottom:2px; border-bottom: 2px solid #bbbbbb">배송정보</h2>
                    <div class="p-4 mb-8">
                        @livewire('WidgetShopCheckoutShipping',['orderidx'=>$orderidx])
                    </div>


                    <h2 class="font-bold text-3xl" style="padding-bottom:2px; border-bottom: 2px solid #bbbbbb">포인트 및 캐시 사용</h2>
                    @auth
                    <div class="p-4 mb-8">
                        @livewire('WidgetShopCheckoutCash',['orderidx'=>$orderidx])
                    </div>
                    @endauth
                    @guest
                    <div class="p-4 mb-8">
                        포인트 및 캐시는 가입된 회원만 가능합니다.
                    </div>
                    @endguest


                    <h2 class="font-bold text-3xl" style="padding-bottom:2px; border-bottom: 2px solid #bbbbbb">결제수단</h2>
                    <!-- Checkboxes Stacked -->
                    <div class="space-y-2">

                        <label class="flex items-center">
                            <input type="radio" class="border border-gray-200 h-4 w-4 text-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="radio_stacked1" name="group_radio_stacked" checked>
                            <span class="ml-2">카드결제(신용/체크)</span>
                        </label>

                        <label class="flex items-center">
                            <input type="radio" class="border border-gray-200 h-4 w-4 text-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="radio_stacked2" name="group_radio_stacked">
                            <span class="ml-2">무통장입금</span>
                        </label>

                        <label class="flex items-center">
                            <input type="radio" class="border border-gray-200 h-4 w-4 text-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="radio_stacked3" name="group_radio_stacked">
                            <span class="ml-2">소액결제(휴대폰)</span>
                        </label>

                        <label class="flex items-center">
                            <input type="radio" class="border border-gray-200 h-4 w-4 text-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" id="radio_stacked3" name="group_radio_stacked">
                            <span class="ml-2">방문결제</span>
                        </label>

                    </div>
                    <!-- END Checkboxes Stacked -->

                </div>
                <div class="w-1/3">
                    <h2 class="font-bold text-3xl" style="padding-bottom:2px; border-bottom: 2px solid #bbbbbb">결제금액</h2>
                    <div class="mb-4">
                        @livewire('WidgetShopCheckoutPay',['orderidx'=>$orderidx])
                    </div>

                    <br>

                    <div class="p-4 mb-4">
                        개인정보 제3자 정보고시<br>
                        전자상거래 구매안전 서비스 안내<br>
                    </div>

                </div>
            </div>



        </main>

    </x-theme-layout>
</x-theme>
