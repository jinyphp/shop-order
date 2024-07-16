<div class="col-md-8">
    <h1>장바구니</h1>
    <table class="table table-borderless w-100">
        <thead>
            <tr>
                <th scope="col">상품</th>
                <th scope="col">가격</th>
                <th scope="col">수량</th>
                <th scope="col">합계</th>
                <th scope="col">삭제</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td class="align-middle">
                        <div class="d-flex align-items-center">
                            <img src="{{ $item->image }}" alt="{{ $item->product }}" class="img-thumbnail" style="width: 70px; height: auto;">
                            <div class="ml-3">
                                <strong>{{ $item->product }}</strong><br>
                                <span>옵션: {{ $item->option }}</span><br>
                            </div>
                        </div>
                    </td>
                    <td class="align-middle">{{ number_format($item->price) }}</td>
                    <td class="align-middle">
                        <input type="number" class="form-control" value="{{ $item->quantity }}" min="1" style="width: 70px;">
                    </td>
                    <td class="align-middle">{{ number_format($item->price * $item->quantity) }}</td>
                    <td class="align-middle">
                        <button wire:click="removeFromCart({{ $item->id }})" class="btn btn-danger btn-sm">×</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- <div class="col-md-8">
    <h1>장바구니</h1>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">상품</th>
                <th scope="col">가격</th>
                <th scope="col">수량</th>
                <th scope="col">합계</th>
                <th scope="col">삭제</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ $item->image }}" alt="{{ $item->product }}" class="img-thumbnail" style="width: 50px;">
                            <div class="ml-3">
                                <strong>{{ $item->product }}</strong><br>
                                <span>옵션: {{ $item->option }}</span><br>
                            </div>
                        </div>
                    </td>
                    <td>{{ number_format($item->price) }}</td>
                    <td>
                        <input type="number" class="form-control" value="{{ $item->quantity }}" min="1" style="width: 70px;">
                    </td>
                    <td>{{ number_format($item->price * $item->quantity) }}</td>
                    <td>
                        <button wire:click="removeFromCart({{ $item->id }})" class="btn btn-danger btn-sm">×</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
