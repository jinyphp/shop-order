<div>
    <div class="bg-body-tertiary rounded-5 p-4 mb-3">
        <div class="p-sm-2 p-lg-0 p-xl-2">
            <div class="border-bottom pb-4 mb-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5 class="mb-0">Order summary</h5>
                    <div class="nav">
                        <a class="nav-link text-decoration-underline p-0" href="cart">Edit</a>
                    </div>
                </div>
                <a class="d-flex align-items-center gap-2 text-decoration-none" href="#orderPreview" data-bs-toggle="offcanvas">
                    @foreach ($cartItems as $item)
                        <div class="ratio ratio-1x1" style="max-width: 64px">
                            <img src="{{ $item->image }}" class="d-block p-1" alt="{{ $item->product }}">
                        </div>
                    @endforeach
                    <i class="ci-chevron-right text-body fs-xl p-0 ms-auto"></i>
                </a>
            </div>
            <ul class="list-unstyled fs-sm gap-3 mb-0">
                <li class="d-flex justify-content-between">
                    Subtotal ({{ count($cartItems) }} items):
                    <span class="text-dark-emphasis fw-medium">${{ $subtotal }}</span>
                </li>
                <li class="d-flex justify-content-between">
                    Saving:
                    <span class="text-danger fw-medium">-${{ $saving }}</span>
                </li>
                <li class="d-flex justify-content-between">
                    Tax collected:
                    <span class="text-dark-emphasis fw-medium">${{ $tax }}</span>
                </li>
                <li class="d-flex justify-content-between">
                    Shipping:
                    <span class="text-dark-emphasis fw-medium">Calculated at checkout</span>
                </li>
            </ul>
            <div class="border-top pt-4 mt-4">
                <div class="d-flex justify-content-between mb-3">
                    <span class="fs-sm">Estimated total:</span>
                    <span class="h5 mb-0">${{ $total }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
