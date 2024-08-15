<div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1" aria-labelledby="shoppingCartLabel" style="width: 500px" wire:ignore.self>
    <!-- Header -->
    <div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
        <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-lg-4">
            <h4 class="offcanvas-title" id="shoppingCartLabel">Shopping cart</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="alert alert-success text-dark-emphasis fs-sm border-0 rounded-4 mb-0" role="alert">
            Congratulations 🎉 You have added more than <span class="fw-semibold">$50</span> to your cart. <span class="fw-semibold">Delivery is free</span> for you!
        </div>
    </div>

    <!-- Items -->
    <div class="offcanvas-body d-flex flex-column gap-4 pt-2">
        @foreach ($cart as $item)
            <!-- Item -->
            <div class="d-flex align-items-center">
                <a class="position-relative flex-shrink-0" href="shop-product-grocery">
                    @if ($item['discount'])
                        <span class="badge text-bg-danger position-absolute top-0 start-0 z-2 mt-0 ms-0">-{{ $item['discount'] }}%</span>
                    @endif
                    <img src="{{ $item['image'] }}" width="110" alt="Thumbnail">
                </a>
                <div class="w-100 ps-3">
                    <h5 class="fs-sm fw-medium lh-base mb-2">
                        <a class="hover-effect-underline" href="shop-product-grocery">{{ $item['product'] }}</a>
                    </h5>
                    <div class="h6 pb-1 mb-2">${{ $item['price'] }}</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="count-input rounded-pill">
                            <button type="button" class="btn btn-icon btn-sm" wire:click="decrementQuantity({{ $item['id'] }})" aria-label="Decrement quantity">
                                <i class="ci-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm" value="{{ $item['quantity'] }}" readonly>
                            <button type="button" class="btn btn-icon btn-sm" wire:click="incrementQuantity({{ $item['id'] }})" aria-label="Increment quantity">
                                <i class="ci-plus"></i>
                            </button>
                        </div>
                        <button type="button" class="btn-close fs-sm" wire:click="removeItem({{ $item['id'] }})" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    <div class="offcanvas-header flex-column align-items-start">
        <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
            <span class="text-light-emphasis">Subtotal:</span>
            <span class="h6 mb-0">${{ $subtotal }}</span>
        </div>
        <div class="d-flex w-100 gap-3">
            <a class="btn btn-lg btn-secondary w-100 rounded-pill" href="cart">View cart</a>
            <a class="btn btn-lg btn-primary w-100 rounded-pill" href="delivery">Checkout</a>
        </div>
    </div>
</div>

{{-- <div class="offcanvas offcanvas-end pb-sm-2 px-sm-2" id="shoppingCart" tabindex="-1" aria-labelledby="shoppingCartLabel" style="width: 500px" wire:ignore.self>
    <!-- Header -->
    <div class="offcanvas-header flex-column align-items-start py-3 pt-lg-4">
        <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-lg-4">
            <h4 class="offcanvas-title" id="shoppingCartLabel">Shopping cart</h4>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="alert alert-success text-dark-emphasis fs-sm border-0 rounded-4 mb-0" role="alert">
            Congratulations 🎉 You have added more than <span class="fw-semibold">$50</span> to your cart. <span class="fw-semibold">Delivery is free</span> for you!
        </div>
    </div>

    <!-- Items -->
    <div class="offcanvas-body d-flex flex-column gap-4 pt-2">
        @foreach ($cart as $item)
            <!-- Item -->
            <div class="d-flex align-items-center">
                <a class="position-relative flex-shrink-0" href="shop-product-grocery">
                    @if ($item['discount'])
                        <span class="badge text-bg-danger position-absolute top-0 start-0 z-2 mt-0 ms-0">-{{ $item['discount'] }}%</span>
                    @endif
                    <img src="{{ $item['image'] }}" width="110" alt="Thumbnail">
                </a>
                <div class="w-100 ps-3">
                    <h5 class="fs-sm fw-medium lh-base mb-2">
                        <a class="hover-effect-underline" href="shop-product-grocery">{{ $item['product'] }}</a>
                    </h5>
                    <div class="h6 pb-1 mb-2">${{ $item['price'] }}</div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="count-input rounded-pill">
                            <button type="button" class="btn btn-icon btn-sm" wire:click="decrementQuantity({{ $item['id'] }})" aria-label="Decrement quantity">
                                <i class="ci-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm" value="{{ $item['quantity'] }}" readonly>
                            <button type="button" class="btn btn-icon btn-sm" wire:click="incrementQuantity({{ $item['id'] }})" aria-label="Increment quantity">
                                <i class="ci-plus"></i>
                            </button>
                        </div>
                        <button type="button" class="btn-close fs-sm" wire:click="removeItem({{ $item['id'] }})" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-sm" data-bs-title="Remove" aria-label="Remove from cart"></button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Footer -->
    <div class="offcanvas-header flex-column align-items-start">
        <div class="d-flex align-items-center justify-content-between w-100 mb-3 mb-md-4">
            <span class="text-light-emphasis">Subtotal:</span>
            <span class="h6 mb-0">${{ $subtotal }}</span>
        </div>
        <div class="d-flex w-100 gap-3">
            <a class="btn btn-lg btn-secondary w-100 rounded-pill" href="cart">View cart</a>
            <a class="btn btn-lg btn-primary w-100 rounded-pill" href="delivery">Checkout</a>
        </div>
    </div>
</div> --}}
