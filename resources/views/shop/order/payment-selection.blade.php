<div>
    <div class="btn-group" role="group" aria-label="Payment Methods">
        @foreach($paymentMethods as $method)
            <button type="button"
                    class="btn {{ $selectedPaymentMethod === $method->id ? 'btn-primary' : 'btn-outline-primary' }}"
                    wire:click.prevent="selectPaymentMethod({{ $method->id }})">
                {{ $method->name }}
            </button>
        @endforeach
    </div>
</div>
