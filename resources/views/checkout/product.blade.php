<div>
    <!-- Livewire loading indicator -->
    <x-loading-star />

    @if(count($products) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>상품명</th>
                <th class="w-32 text-center">수량</th>
                <th class="w-32 text-center">금액</th>
                <th class="w-32 text-center">할인금액</th>
                <th class="w-32 text-center">적용금액</th>
                <th class="w-32 text-center">배송비</th>
                <th class="w-32 text-center">관리</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr>
                <td class="flex space-x-2">
                    <div class="w-32">
                        <figure>
                            <img src="{{ asset($item->image) }}">
                        </figure>
                    </div>
                    <div class="flex-1">
                        <a href="/shop/detail/{{$item->product_id}}">
                            {{$item->product}}
                        </a>
                    </div>
                </td>

                <td class="w-32 text-center">
                    <span>{{$item->quantity}}개</span>
                </td>

                <td class="w-32 text-center">
                    <div class="font-bold">
                        {{$item->price}}
                    </div>
                </td>

                <td class="w-32">
                    <div class="text-center text-red-600">
                        - {{$item->coupon_value}} 원
                    </div>

                    <div class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                        <a href="#" wire:click="$emit('coupon','{{$item->id}}')">
                            쿠폰
                        </a>
                    </div>
                </td>

                <td class="w-32 font-bold text-2xl text-center">
                    {{$item->price * $item->quantity }} 원
                </td>

                {{-- 배송비 --}}
                <td class="w-32 text-center">

                </td>

                <td class="w-32 text-center">
                    <a href="#" class="btn btn-delete" title="" wire:click="destroy('{{$item->id}}')">
                        <span>Delete</span>
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </a>
                                            {{--
                        <p class="text-center">
                            <a href="#" wire:click.prevent="switchToSaveForLater('{{$item->rowId}}')">Save For Later</a>
                        </p>
                        --}}
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>

    <div class="flex items-center space-x-2 mb-4">
        <x-btn-danger wire:click="confirmDeleteAll">전체삭제</x-btn-danger>
        <x-btn-danger>갱신</x-btn-danger>
    </div>

    @else
    <div class="text-center p-8 mb-4">
        <p>주문할 상품을 담아 주세요.</p>
        <a href="/shop">쇼핑하기 이동</a>
    </div>
    @endif



    {{-- 변경사항 알람 팝업창 --}}
    <x-wire-dialog-modal maxWidth="4xl" wire:model="popupConfirmDelete">
        <x-slot name="title">
            {{ __('주문 삭제') }}
        </x-slot>
        <x-slot name="content">
            현재 주문을 모두 상품을 삭제 할까요?

            <x-btn-danger wire:click="destroyAll">예, 삭제합니다.</x-btn-danger>

        </x-slot>
        <x-slot name="footer">
            <x-btn-primary wire:click="popupClose">닫기</x-btn-primary>
        </x-slot>
    </x-wire-dialog-modal>

</div>
