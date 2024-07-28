<table class="table position-relative z-2 mb-4">
    <thead>
        <tr>
            <th scope="col" class="fs-sm fw-normal py-3 ps-0"><span class="text-body">Product</span></th>
            <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-xl-table-cell"><span class="text-body">Price</span></th>
            <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span class="text-body">Quantity</span></th>
            <th scope="col" class="text-body fs-sm fw-normal py-3 d-none d-md-table-cell"><span class="text-body">Total</span></th>
            <th scope="col" class="py-0 px-0">
                <div class="nav justify-content-end">
                    <button type="button" class="nav-link d-inline-block text-decoration-underline text-nowrap py-3 px-0" wire:click="clearCart">Clear cart</button>
                </div>
            </th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @foreach ($cartItems as $item)
        <tr>
            <td class="py-3 ps-0">
                <div class="d-flex align-items-center">
                    <a class="flex-shrink-0" href="#">
                        <img src="{{ $item->image }}" width="110" alt="{{ $item->product }}">
                    </a>
                    <div class="w-100 min-w-0 ps-2 ps-xl-3">
                        <h5 class="d-flex animate-underline mb-2">
                            <a class="d-block fs-sm fw-medium text-truncate animate-target" href="#">{{ $item->product }}</a>
                        </h5>
                        <ul class="list-unstyled gap-1 fs-xs mb-0">
                            <li><span class="text-body-secondary">Option:</span> <span class="text-dark-emphasis fw-medium">{{ $item->option }}</span></li>
                            <li class="d-xl-none"><span class="text-body-secondary">Price:</span> <span class="text-dark-emphasis fw-medium">${{ $item->price }}</span></li>
                        </ul>
                        <div class="count-input rounded-2 d-md-none mt-3">
                            <button type="button" class="btn btn-sm btn-icon" wire:click="decrementQuantity({{ $item->id }})" aria-label="Decrement quantity">
                                <i class="ci-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}" readonly>
                            <button type="button" class="btn btn-sm btn-icon" wire:click="incrementQuantity({{ $item->id }})" aria-label="Increment quantity">
                                <i class="ci-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </td>
            <td class="h6 py-3 d-none d-xl-table-cell">${{ $item->price }}</td>
            <td class="py-3 d-none d-md-table-cell">
                <div class="count-input">
                    <button type="button" class="btn btn-icon" wire:click="decrementQuantity({{ $item->id }})" aria-label="Decrement quantity">
                        <i class="ci-minus"></i>
                    </button>
                    <input type="number" class="form-control" value="{{ $item->quantity }}" readonly>
                    <button type="button" class="btn btn-icon" wire:click="incrementQuantity({{ $item->id }})" aria-label="Increment quantity">
                        <i class="ci-plus"></i>
                    </button>
                </div>
            </td>
            <td class="h6 py-3 d-none d-md-table-cell">${{ $item->price * $item->quantity }}</td>
            <td class="text-end py-3 px-0">
                <button type="button" class="btn-close fs-sm" wire:click="removeItem({{ $item->id }})" aria-label="Remove from cart"></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
