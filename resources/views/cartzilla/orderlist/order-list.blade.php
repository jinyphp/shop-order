<div data-filter-list='{"listClass": "orders-list", "sortClass": "orders-sort", "valueNames": ["date", "total"]}'>
    <table class="table align-middle fs-sm text-nowrap">
        <thead>
            <tr>
                <th scope="col" class="py-3 ps-0">
                    <span class="text-body fw-normal">Order <span class="d-none d-md-inline">#</span></span>
                </th>
                <th scope="col" class="py-3 d-none d-md-table-cell">
                    <button type="button" class="btn orders-sort fw-normal text-body p-0" data-sort="date">Order date</button>
                </th>
                <th scope="col" class="py-3 d-none d-md-table-cell">
                    <span class="text-body fw-normal">Status</span>
                </th>
                <th scope="col" class="py-3 d-none d-md-table-cell">
                    <button type="button" class="btn orders-sort fw-normal text-body p-0" data-sort="total">Total</button>
                </th>
                <th scope="col" class="py-3">&nbsp;</th>
            </tr>
        </thead>
        <tbody class="text-body-emphasis orders-list">
            @foreach($orders as $order)
            <tr>
                <td class="fw-medium pt-2 pb-3 py-md-2 ps-0">
                    <a class="d-inline-block animate-underline text-body-emphasis text-decoration-none py-2" href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails" aria-label="Show order details">
                        <span class="animate-target">{{ $order->id }}</span>
                    </a>
                    <ul class="list-unstyled fw-normal text-body m-0 d-md-none">
                        <li>{{ date('M j, Y', strtotime($order->created_at)) }}</li>
                        <li class="d-flex align-items-center">
                            <span class="bg-info rounded-circle p-1 me-2"></span>
                            {{ ucfirst($order->status) }}
                        </li>
                        <li class="fw-medium text-body-emphasis">${{ number_format($order->total, 2) }}</li>
                    </ul>
                </td>
                <td class="fw-medium py-3 d-none d-md-table-cell">
                    {{ date('M j, Y', strtotime($order->created_at)) }}
                    <span class="date d-none">{{ date('y-m-d', strtotime($order->created_at)) }}</span>
                </td>
                <td class="fw-medium py-3 d-none d-md-table-cell">
                    <span class="d-flex align-items-center">
                        <span class="bg-info rounded-circle p-1 me-2"></span>
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td class="fw-medium py-3 d-none d-md-table-cell">
                    ${{ number_format($order->total, 2) }}
                    <span class="total d-none">{{ $order->total }}</span>
                </td>
                <td class="py-3 pe-0">
                    <span class="d-flex align-items-center justify-content-end position-relative gap-1 gap-sm-2 ms-n2 ms-sm-0">
                        {{-- <span><img src="/assets/img/shop/electronics/thumbs/20.png" width="64" alt="Thumbnail"></span> --}}
                        <a class="btn btn-icon btn-ghost btn-secondary stretched-link border-0" href="#orderDetails" data-bs-toggle="offcanvas" aria-controls="orderDetails" aria-label="Show order details">
                            <i class="ci-chevron-right fs-lg"></i>
                        </a>
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
