<div>
    주문번호 : {{ $cartidx }}
    <!-- Table of items -->
    <table class="table position-relative z-2 mb-4">
        <thead>
            <tr>
                <th scope="col" class="fs-sm fw-normal py-3 ps-0"><span class="text-body">Product</span></th>
                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-xl-table-cell"><span
                        class="text-body">Price</span></th>
                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span
                        class="text-body">Quantity</span></th>
                <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span
                        class="text-body">Total</span></th>
                <th scope="col" class="py-0 px-0">
                    <div class="nav justify-content-end">
                        <button type="button"
                            class="nav-link d-inline-block text-decoration-underline text-nowrap py-3 px-0"
                            wire:click="clearCart()">
                            전체삭제
                        </button>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody class="align-middle">
            @foreach($cart as $item)
            <!-- Item -->
            <tr>
                <td class="py-3 ps-0">
                    <div class="d-flex align-items-center">
                        <a class="position-relative flex-shrink-0"
                            href="/goods/{{$item['id']}}">

                            {{-- 할인표시--}}
                            @if($item['discount'])
                            <span class="badge text-bg-danger position-absolute top-0 start-0">
                                -{{ number_format($item['discount']) }}
                            </span>
                            @endif

                            <img src="{{$item['image']}}"
                                width="110"
                                alt="Thumbnail">
                        </a>
                        <div class="ps-2 ps-xl-3">
                            <h5 class="lh-sm mb-2">
                                <a class="hover-effect-underline fs-sm fw-medium"
                                    href="/goods/{{$item['id']}}">
                                    {{$item['product']}}
                                </a>
                            </h5>
                            <ul class="list-unstyled gap-1 fs-xs mb-0">
                                <li>
                                    <span class="text-body-secondary">Portion:</span>
                                    <span
                                        class="text-dark-emphasis fw-medium">1kg</span>
                                </li>
                                <li class="d-xl-none">
                                    <span class="text-body-secondary">Price:</span>
                                    @if($item['discount'])
                                    <span class="text-dark-emphasis fw-medium">
                                        {{ number_format($item['price'] - $item['discount']) }}
                                        <del class="text-body-tertiary fw-normal">{{ number_format($item['price']) }}  </del>
                                    </span>
                                    @else
                                    <span class="text-dark-emphasis fw-medium">
                                        {{ number_format($item['price']) }}
                                    </span>
                                    @endif
                                </li>
                            </ul>
                            <div class="count-input rounded-pill d-md-none mt-3">
                                <button type="button" class="btn btn-sm btn-icon"
                                    data-decrement
                                    aria-label="Decrement quantity">
                                    <i class="ci-minus"></i>
                                </button>
                                <input type="number" class="form-control form-control-sm"
                                    value="3" readonly>
                                <button type="button" class="btn btn-sm btn-icon"
                                    data-increment
                                    aria-label="Increment quantity">
                                    <i class="ci-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-xl-table-cell">
                    @if($item['discount'])
                    <span class="text-dark-emphasis fw-medium">
                        {{ number_format($item['price'] - $item['discount']) }}
                        <del class="text-body-tertiary fw-normal">{{ number_format($item['price']) }}  </del>
                    </span>
                    @else
                    <span class="text-dark-emphasis fw-medium">
                        {{ number_format($item['price']) }}
                    </span>
                    @endif
                </td>
                <td class="py-3 d-none d-md-table-cell">
                    <div class="count-input rounded-pill">
                        <button type="button" class="btn btn-icon"
                            wire:click="decrementQuantity({{ $item['id'] }})">
                            <i class="ci-minus"></i>
                        </button>
                        <input type="number" class="form-control" value="{{ $item['quantity'] }}" readonly>
                        <button type="button" class="btn btn-icon"
                            wire:click="incrementQuantity({{ $item['id'] }})">
                            <i class="ci-plus"></i>
                        </button>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-md-table-cell">
                    {{ number_format($item['total']) }}
                </td>
                <td class="text-end py-3 px-0">
                    <button type="button" class="btn-close fs-sm" wire:click="removeItem({{ $item['id'] }})">
                    </button>
                </td>
            </tr>
            @endforeach


            {{-- <!-- Item -->
            <tr>
                <td class="py-3 ps-0">
                    <div class="d-flex align-items-center">
                        <a class="flex-shrink-0" href="shop-product-grocery.html">
                            <img src="assets/img/shop/grocery/thumbs/02.png" width="110" alt="Thumbnail">
                        </a>
                        <div class="ps-2 ps-xl-3">
                            <h5 class="lh-sm mb-2">
                                <a class="hover-effect-underline fs-sm fw-medium" href="shop-product-grocery.html">Pesto
                                    sauce Barilla with basil, Italy</a>
                            </h5>
                            <ul class="list-unstyled gap-1 fs-xs mb-0">
                                <li><span class="text-body-secondary">Portion:</span> <span
                                        class="text-dark-emphasis fw-medium">200g</span></li>
                                <li class="d-xl-none"><span class="text-body-secondary">Price:</span> <span
                                        class="text-dark-emphasis fw-medium">$3.95</span></li>
                            </ul>
                            <div class="count-input rounded-pill d-md-none mt-3">
                                <button type="button" class="btn btn-sm btn-icon" data-decrement
                                    aria-label="Decrement quantity">
                                    <i class="ci-minus"></i>
                                </button>
                                <input type="number" class="form-control form-control-sm" value="1" readonly>
                                <button type="button" class="btn btn-sm btn-icon" data-increment
                                    aria-label="Increment quantity">
                                    <i class="ci-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-xl-table-cell">$3.95</td>
                <td class="py-3 d-none d-md-table-cell">
                    <div class="count-input rounded-pill">
                        <button type="button" class="btn btn-icon" data-decrement aria-label="Decrement quantity">
                            <i class="ci-minus"></i>
                        </button>
                        <input type="number" class="form-control" value="1" readonly>
                        <button type="button" class="btn btn-icon" data-increment aria-label="Increment quantity">
                            <i class="ci-plus"></i>
                        </button>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-md-table-cell">$3.95</td>
                <td class="text-end py-3 px-0">
                    <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip"
                        data-bs-custom-class="tooltip-sm" data-bs-title="Remove"
                        aria-label="Remove from cart"></button>
                </td>
            </tr>

            <!-- Item -->
            <tr>
                <td class="py-3 ps-0">
                    <div class="d-flex align-items-center">
                        <a class="flex-shrink-0" href="shop-product-grocery.html">
                            <img src="assets/img/shop/grocery/thumbs/03.png" width="110" alt="Thumbnail">
                        </a>
                        <div class="ps-2 ps-xl-3">
                            <h5 class="lh-sm mb-2">
                                <a class="hover-effect-underline fs-sm fw-medium"
                                    href="shop-product-grocery.html">Steak salmon fillet with rosmary</a>
                            </h5>
                            <ul class="list-unstyled gap-1 fs-xs mb-0">
                                <li><span class="text-body-secondary">Portion:</span> <span
                                        class="text-dark-emphasis fw-medium">1kg</span></li>
                                <li class="d-xl-none"><span class="text-body-secondary">Price:</span> <span
                                        class="text-dark-emphasis fw-medium">$27.00</span></li>
                            </ul>
                            <div class="count-input rounded-pill d-md-none mt-3">
                                <button type="button" class="btn btn-sm btn-icon" data-decrement
                                    aria-label="Decrement quantity">
                                    <i class="ci-minus"></i>
                                </button>
                                <input type="number" class="form-control form-control-sm" value="2" readonly>
                                <button type="button" class="btn btn-sm btn-icon" data-increment
                                    aria-label="Increment quantity">
                                    <i class="ci-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-xl-table-cell">$27.00</td>
                <td class="py-3 d-none d-md-table-cell">
                    <div class="count-input rounded-pill">
                        <button type="button" class="btn btn-icon" data-decrement aria-label="Decrement quantity">
                            <i class="ci-minus"></i>
                        </button>
                        <input type="number" class="form-control" value="2" readonly>
                        <button type="button" class="btn btn-icon" data-increment aria-label="Increment quantity">
                            <i class="ci-plus"></i>
                        </button>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-md-table-cell">$54.00</td>
                <td class="text-end py-3 px-0">
                    <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip"
                        data-bs-custom-class="tooltip-sm" data-bs-title="Remove"
                        aria-label="Remove from cart"></button>
                </td>
            </tr>

            <!-- Item -->
            <tr>
                <td class="py-3 ps-0">
                    <div class="d-flex align-items-center">
                        <a class="flex-shrink-0" href="shop-product-grocery.html">
                            <img src="assets/img/shop/grocery/thumbs/04.png" width="110" alt="Thumbnail">
                        </a>
                        <div class="ps-2 ps-xl-3">
                            <h5 class="lh-sm mb-2">
                                <a class="hover-effect-underline fs-sm fw-medium"
                                    href="shop-product-grocery.html">Sprite soda lemon lime, can</a>
                            </h5>
                            <ul class="list-unstyled gap-1 fs-xs mb-0">
                                <li><span class="text-body-secondary">Portion:</span> <span
                                        class="text-dark-emphasis fw-medium">330ml</span></li>
                                <li class="d-xl-none"><span class="text-body-secondary">Price:</span> <span
                                        class="text-dark-emphasis fw-medium">$0.80</span></li>
                            </ul>
                            <div class="count-input rounded-pill d-md-none mt-3">
                                <button type="button" class="btn btn-sm btn-icon" data-decrement
                                    aria-label="Decrement quantity">
                                    <i class="ci-minus"></i>
                                </button>
                                <input type="number" class="form-control form-control-sm" value="2" readonly>
                                <button type="button" class="btn btn-sm btn-icon" data-increment
                                    aria-label="Increment quantity">
                                    <i class="ci-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-xl-table-cell">$0.80</td>
                <td class="py-3 d-none d-md-table-cell">
                    <div class="count-input rounded-pill">
                        <button type="button" class="btn btn-icon" data-decrement aria-label="Decrement quantity">
                            <i class="ci-minus"></i>
                        </button>
                        <input type="number" class="form-control" value="2" readonly>
                        <button type="button" class="btn btn-icon" data-increment aria-label="Increment quantity">
                            <i class="ci-plus"></i>
                        </button>
                    </div>
                </td>
                <td class="h6 py-3 d-none d-md-table-cell">$1.60</td>
                <td class="text-end py-3 px-0">
                    <button type="button" class="btn-close fs-sm" data-bs-toggle="tooltip"
                        data-bs-custom-class="tooltip-sm" data-bs-title="Remove"
                        aria-label="Remove from cart"></button>
                </td>
            </tr> --}}
        </tbody>
    </table>
</div>
