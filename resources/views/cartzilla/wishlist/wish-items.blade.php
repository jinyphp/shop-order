<div>
    <x-loading-indicator/>

    <!-- Master checkbox + Action buttons -->
    <div class="nav align-items-center mb-4">
        {{--
        <div class="form-checkl nav-link animate-underline fs-lg ps-0 pe-2 py-2 mt-n1 me-4"
            data-master-checkbox='{"container": "#wishlistSelection", "label": "Select all", "labelChecked": "Unselect all", "showOnCheck": "#action-buttons"}'>
            <input type="checkbox" class="form-check-input" id="wishlist-master" checked>
            <label for="wishlist-master" class="form-check-label animate-target mt-1 ms-2">Unselect all</label>
        </div>
        --}}
        <div class="d-flex flex-wrap" id="action-buttons">
            {{-- 장바구니 이동 --}}
            <a class="nav-link animate-underline px-0 pe-sm-2 py-2 me-4"
                href="javascript:void(0);"
                wire:click="addCart()">
                <i class="ci-shopping-cart fs-base me-2"></i>
                <span class="animate-target d-none d-md-inline">Add to cart</span>
            </a>

            {{-- 화면갱신 --}}
            <a class="nav-link animate-underline px-0 pe-sm-2 py-2 me-4"
                href="javascript:void(0);"
                wire:click="realod()">
                <i class="ci-repeat fs-base me-2"></i>
                <span class="animate-target d-none d-md-inline">Relocate</span>
            </a>

            {{-- wish 상품 삭제 --}}
            <a class="nav-link animate-underline px-0 py-2"
                href="javascript:void(0);"
                wire:click="removeItems()">
                <i class="ci-trash fs-base me-1"></i>
                <span class="animate-target d-none d-md-inline">Remove selected</span>
            </a>
        </div>
    </div>

    <div class="row row-cols-2 row-cols-md-3 g-4" id="wishlistSelection">
        @foreach ($rows as $item)
            @includeIf($viewCell, ['item' => $item])
        @endforeach
    </div>
</div>
