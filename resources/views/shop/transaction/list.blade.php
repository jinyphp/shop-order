<div>
    <h1>거래 내역</h1>
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true">거래 목록</li>
        @foreach($transactions as $transaction)
            <li class="list-group-item">
                <strong>ID:</strong> {{ $transaction->id }}<br>
                <strong>유저 ID:</strong> {{ $transaction->user_id }}<br>
                <strong>주문 ID:</strong> {{ $transaction->order_id }}<br>
                <strong>결제 수단:</strong> {{ $transaction->mode }}<br>
                <strong>상태:</strong> {{ $transaction->status }}<br>
                <div class="btn-group" role="group">
                    <button wire:click="updateStatus({{ $transaction->id }}, 'approved')" class="btn btn-outline-primary">승인</button>
                    <button wire:click="updateStatus({{ $transaction->id }}, 'declined')" class="btn btn-outline-primary">거절</button>
                    <button wire:click="updateStatus({{ $transaction->id }}, 'refunded')" class="btn btn-outline-primary">환불</button>
                    <button wire:click="updateStatus({{ $transaction->id }}, 'pending')" class="btn btn-outline-primary">대기</button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
