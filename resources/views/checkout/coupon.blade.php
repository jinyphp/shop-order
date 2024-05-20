<div>
    <!-- Livewire loading indicator -->
    <x-loading-star />

    @if($popup)
    <x-wire-dialog-modal maxWidth="7xl" wire:model="popup">
        <x-slot name="title">
            {{ __('쿠폰 적용') }}
        </x-slot>
        <x-slot name="content">

            <div class="p-4 text-bold text-3xl">
                {{$cproduct['product']}}
            </div>

            <div class="flex">
                <div class="w-2/3">
                    <div>할인</div>
                    <div>판매자할인</div>
                    <div>중복할인</div>
                    @foreach($coupons as $i => $coupon)
                    <div class="flex space-x-2">
                        {{--
                        <input type="radio" name="coupon"
                            @if($coupon->id == $cproduct['coupon']) checked @endif
                        >
                        --}}

                        <label class="flex items-center">
                            <input type="radio"
                            class="border border-gray-200 h-4 w-4 text-blue-500 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                            id="coupon{{$i}}"
                            name="coupon"
                            value="{{$coupon->id}}"
                            @if($coupon->id == $cproduct['coupon']) checked @endif
                            wire:model="forms.coupon">

                            <span class="ml-2">{{$coupon->value}}</span>
                        </label>

                        <div class="font-bold text-red-600">{{$coupon->value}}원 할인</div>
                        <div>
                            <div>{{$coupon->name}}</div>
                            <div>{{$coupon->description}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="w-1/3">
                    <div>상품금액 : {{$cproduct['price']}}</div>
                    <div>할인금액 : {{$discount}}</div>
                    <div>판매자 할인금액</div>
                    <div>중복 할인금액</div>
                    <div>카드사별 할인금액</div>
                    <div>복수 할인금액</div>
                    <hr>
                    <div>할인 적용금액 : {{ $cproduct['price'] - $discount}}</div>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-btn-second wire:click="closePopup">닫기</x-btn-second>
            <x-btn-primary wire:click="apply">적용</x-btn-primary>
        </x-slot>
    </x-wire-dialog-modal>
    @endif

</div>
