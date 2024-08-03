<div>
    <div class="mb-4" id="paymentMethod" role="list">
        @foreach($paymentMethods as $paymentMethod)
            <div class="mt-4">
                <div class="form-check mb-0" role="listitem">
                    <label class="form-check-label d-flex align-items-center text-dark-emphasis fw-semibold">
                        <input type="radio" class="form-check-input fs-base me-2 me-sm-3" name="payment-method" wire:click="selectPaymentMethod({{ $paymentMethod->id }})" @if($selectedPaymentMethod == $paymentMethod->id) checked @endif>
                        {{ $paymentMethod->name }}
                        @if($paymentMethod->image)
                            <img src="{{ asset($paymentMethod->image) }}" class="ms-3" width="36" alt="{{ $paymentMethod->name }}">
                        @endif
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>
