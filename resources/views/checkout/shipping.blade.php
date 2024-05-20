<div>
    <!-- Livewire loading indicator -->
    <x-loading-star />

    <div class="flex justify-between items-center space-x-2">
        <div class="flex justify-between items-center space-x-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-400 h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </span>
            <span class="text-gray-400 text-2xl font-bold">배송지</span>
        </div>
        <div>
            @if($address)
                <span class="curser-pointer" wire:click="openSelect">배송지변경</span>
            @else
            <x-btn-primary wire:click="openPopupAdd">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                추가
            </x-btn-primary>
            @endif
        </div>
    </div>


    @if($address)
    <div class="py-4">
        <div class="flex space-x-2">
            <div class="border-r border-gray-400 pr-2">{{$address->country}}</div>
            <div>
                <div class="space-x-2">
                    <span>{{$address->line1}}</span>
                    <span>{{$address->line2}}</span>
                    <a href="#" wire:click="edit({{$address->id}})">[수정]</a>
                </div>
                <div class="flex space-x-2">
                    @if($address->name)
                    <span>{{$address->name}}</span>
                    @else
                    <span>{{$address->lastname}} {{$address->firstname}}</span>
                    @endif


                    @if($address->mobile)
                    <div class="flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>{{$address->mobile}}</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-4">
        등록된 배송 주소가 없습니다. 또는 로그인 하시면, 등록된 주소를 불어 올수 있습니다.
    </div>
    @endif



    {{-- 주소 추가 팝업창 --}}
    <x-wire-dialog-modal maxWidth="7xl" wire:model="popup">
        <x-slot name="title">
            {{ __('배송 주소록') }}
        </x-slot>
        <x-slot name="content">

            <h3 class="box-title">Shipping Address</h3>
            <div class="billing-address">

                <x-form-hor>
                    <x-form-label>
                        first name<span>*</span>
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.firstname")
                            ->setWidth("standard")
                            ->setPlaceholder("Your name")
                        !!}
                        @error('firstname') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>


                <x-form-hor>
                    <x-form-label>
                        last name<span>*</span>
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.lastname")
                            ->setWidth("standard")
                            ->setPlaceholder("Your last name")
                        !!}
                        @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>


                <x-form-hor>
                    <x-form-label>
                        Email Addreess:
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.email")
                            ->setWidth("standard")
                            ->setPlaceholder("Type your email")
                        !!}
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>

                <x-form-hor>
                    <x-form-label>
                        Phone number<span>*</span>
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.mobile")
                            ->setWidth("standard")
                            ->setPlaceholder("10 digits format")
                        !!}
                        @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>

                <x-form-hor>
                    <x-form-label>
                        Address:
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.line1")
                            ->setWidth("standard")
                            ->setPlaceholder("Street at apartment number")
                        !!}
                        @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>


                <x-form-hor>
                    <x-form-label>
                        Country<span>*</span>
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.country")
                            ->setWidth("standard")
                            ->setPlaceholder("United States")
                        !!}
                        @error('country') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>

                <x-form-hor>
                    <x-form-label>
                        Postcode / ZIP:
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.zipcode")
                            ->setWidth("standard")
                            ->setPlaceholder("Your postal code")
                        !!}
                        @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>

                <x-form-hor>
                    <x-form-label>
                        Town / City<span>*</span>
                    </x-form-label>
                    <x-form-item>
                        {!! xInputText()
                            ->setWire('model.defer',"forms.city")
                            ->setWidth("standard")
                            ->setPlaceholder("City name")
                        !!}
                        @error('city') <span class="text-danger">{{$message}}</span> @enderror
                    </x-form-item>
                </x-form-hor>

                {{--
                <p class="row-in-form fill-wife">

                    <label class="checkbox-field">
                        <input name="create-account" id="create-account" value="forever" type="checkbox">
                        <span>Create an account?</span>
                    </label>


                    <label class="checkbox-field">
                        <input name="different-add" id="different-add" value="1" type="checkbox" wire:model="ship_to_different">
                        <span>Ship to a different address?</span>
                    </label>
                </p>
                --}}

            </div>
        </x-slot>
        <x-slot name="footer">
            @if(isset($forms['id']))
            <x-btn-primary wire:click="update({{$forms['id']}})">수정</x-btn-primary>
            @else
            <x-btn-primary wire:click="save">저장</x-btn-primary>
            @endif

        </x-slot>
    </x-wire-dialog-modal>


    {{-- 주소 변경 팝업창 --}}
    <x-wire-dialog-modal maxWidth="7xl" wire:model="popupSelect">
        <x-slot name="title">
            {{ __('주소 선택') }}
        </x-slot>
        <x-slot name="content">

            <h3 class="box-title">목록</h3>
            <div class="billing-address">

            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th class="w-32">Id</th>
                        <th>주소</th>
                        <th class="w-32">선택</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($addrList as $item)
                    <tr>
                        <td class="w-32">{{$item->id}}</td>
                        <td>
                            <div>{{$address->country}}</div>
                            <div>{{$item->line1}} {{$item->line2}}</div>
                        </td>
                        <td class="w-32">
                            <span class="cursor-pointer hover:text-blue-500"
                            wire:click="selectAddr('{{$item->id}}')">선택</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
        <x-slot name="footer">
            <x-btn-second wire:click="closeSelect">닫기</x-btn-second>
        </x-slot>
    </x-wire-dialog-modal>


</div>
