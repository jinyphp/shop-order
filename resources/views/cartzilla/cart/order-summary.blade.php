<div>
    <div class="bg-body-tertiary rounded-5 p-4 mb-3">
        <div class="p-sm-2 p-lg-0 p-xl-2">
            <h5 class="border-bottom pb-4 mb-4">Order summary</h5>
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
                <a class="btn btn-lg btn-primary w-100" href="delivery">
                    Proceed to checkout
                    <i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
                </a>
                <div class="nav justify-content-center fs-sm mt-3">
                    <a class="nav-link text-decoration-underline p-0 me-1" href="#authForm" data-bs-toggle="offcanvas" role="button">Create an account</a>
                    and get
                    <span class="text-dark-emphasis fw-medium ms-1">239 bonuses</span>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion bg-body-tertiary rounded-5 p-4">
        <div class="accordion-item border-0">
            <h3 class="accordion-header" id="promoCodeHeading">
                <button type="button" class="accordion-button animate-underline collapsed py-0 ps-sm-2 ps-lg-0 ps-xl-2" data-bs-toggle="collapse" data-bs-target="#promoCode" aria-expanded="false" aria-controls="promoCode">
                    <i class="ci-percent fs-xl me-2"></i>
                    <span class="animate-target me-2">Apply promo code</span>
                </button>
            </h3>
            <div class="accordion-collapse collapse" id="promoCode" aria-labelledby="promoCodeHeading">
                <div class="accordion-body pt-3 pb-2 ps-sm-2 px-lg-0 px-xl-2">
                    <form class="needs-validation d-flex gap-2" novalidate>
                        <div class="position-relative w-100">
                            <input type="text" class="form-control" placeholder="Enter promo code" required>
                            <div class="invalid-tooltip bg-transparent py-0">Enter a valid promo code!</div>
                        </div>
                        <button type="submit" class="btn btn-dark">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
