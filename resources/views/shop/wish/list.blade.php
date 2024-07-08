<div>
    <h1>전체 위시리스트</h1>
    <ul class="list-group">
        <li class="list-group-item active" aria-current="true">위시 목록</li>
        @foreach($wishes as $wish)
            <li class="list-group-item">
                <strong>ID:</strong> {{ $wish->id }}<br>
                <strong>이메일:</strong> {{ $wish->email }}<br>
                <strong>제품 ID:</strong> {{ $wish->product_id }}<br>
                <strong>제품명:</strong> {{ $wish->product }}<br>
                <strong>이미지:</strong> <img src="{{ $wish->image }}" alt="{{ $wish->product }}" width="50"><br>
                <strong>만료일:</strong> {{ $wish->expire }}<br>
                <strong>later:</strong> {{ $wish->later }}<br>
                <strong>생성 날짜:</strong> {{ $wish->created_at }}<br>
            </li>
        @endforeach
    </ul>
</div>
