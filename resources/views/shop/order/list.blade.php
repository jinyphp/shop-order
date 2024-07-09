<div>
    <h1>주문 내역</h1>
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true">주문 목록</li>
        @foreach($orders as $order)
            <li class="list-group-item">
                <strong>ID:</strong> {{ $order->id }}<br>
                <strong>유저 ID:</strong> {{ $order->user_id }}<br>
                <strong>Subtotal:</strong> {{ $order->subtotal }}<br>
                <strong>Discount:</strong> {{ $order->discount }}<br>
                <strong>Tax:</strong> {{ $order->tax }}<br>
                <strong>Total:</strong> {{ $order->total }}<br>
                <strong>Firstname:</strong> {{ $order->firstname }}<br>
                <strong>Lastname:</strong> {{ $order->lastname }}<br>
                <strong>Mobile:</strong> {{ $order->mobile }}<br>
                <strong>Email:</strong> {{ $order->email }}<br>
                <strong>Address Line 1:</strong> {{ $order->line1 }}<br>
                <strong>Address Line 2:</strong> {{ $order->line2 }}<br>
                <strong>City:</strong> {{ $order->city }}<br>
                <strong>Province:</strong> {{ $order->province }}<br>
                <strong>Country:</strong> {{ $order->country }}<br>
                <strong>Zipcode:</strong> {{ $order->zipcode }}<br>
                <strong>Status:</strong> {{ $order->status }}<br>
                <strong>Is Shipping Different:</strong> {{ $order->is_shipping_different ? 'Yes' : 'No' }}<br>
                <strong>주문 날짜:</strong> {{ $order->created_at }}<br>
            </li>
        @endforeach
    </ul>
</div>
