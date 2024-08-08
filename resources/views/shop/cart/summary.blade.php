<div>
    <h2 class="h5 border-bottom pb-4 mb-4 me-3">Order summary</h2>

    <div class="tab-content">
        <!-- Delivery tab -->
        <div class="tab-pane show active" id="delivery" role="tabpanel" aria-labelledby="cart-delivery-tab">
            <ul class="list-unstyled fs-sm gap-3 mb-0">
                <li class="d-flex justify-content-between">
                    Subtotal ({{count($cartItems)}} items):
                    <span class="text-dark-emphasis fw-medium">{{number_format($subtotal)}}</span>
                </li>
                <li class="d-flex justify-content-between">
                    Saving:
                    <span class="text-danger fw-medium">{{number_format($saving)}}</span>
                </li>
                <li class="d-flex justify-content-between">
                    Delivery:
                    <span class="text-dark-emphasis fw-medium">Free</span>
                </li>
            </ul>
            <div class="border-top pt-4 mt-4">
                <div class="d-flex justify-content-between mb-3">
                    <span class="fs-sm">Tax:</span>
                    <span class="h5 mb-0">{{number_format($tax)}}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="fs-sm">Estimated total:</span>
                    <span class="h5 mb-0">{{number_format($estimated_total)}}</span>
                </div>
                <a class="btn btn-lg btn-primary w-100 rounded-pill" href="checkout-v2-delivery.html">
                    Proceed to checkout
                    <i class="ci-chevron-right fs-lg ms-1 me-n1"></i>
                </a>
            </div>
        </div>


    </div>

</div>
