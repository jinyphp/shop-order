<div>
    <ul class="list-group">
        @foreach($addresses as $address)
            <li class="list-group-item">
                <p><strong>나라ㅤㅤㅤ</strong> {{ $address->country }}</p>
                <p><strong>주소ㅤㅤㅤ</strong> {{ $address->addr1 }}</p>
                <p><strong>상세주소ㅤ</strong> {{ $address->addr2 }}</p>
                <p><strong>도시ㅤㅤㅤ</strong> {{ $address->city }}</p>
                <p><strong>주ㅤㅤㅤㅤ</strong> {{ $address->province }}</p>
                <p><strong>우편번호ㅤ</strong> {{ $address->zipcode }}</p>
            </li>
        @endforeach
    </ul>
</div>
