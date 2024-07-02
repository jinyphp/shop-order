<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>id</th>
        <th width='100'>유저 id</th>
        <th width='200'>부분합</th>
        <th width='200'>할인</th>
        <th width='200'>세금</th>
        <th width='200'>합계</th>
        <th width='200'>이름</th>
        <th width='200'>성</th>
        <th width='200'>핸드폰</th>
        <th width='200'>이메일</th>
        <th width='200'>line1</th>
        <th width='200'>line2</th>
        <th width='200'>도시</th>
        <th width='200'>주</th>
        <th width='200'>나라</th>
        <th width='200'>우편번호</th>
        <th width='200'>상태</th>
        <th width='200'>is_shipping_different</th>
        <th width='200'>수정일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='50'>
                    {{$item->id}}
                </td>
                <td width='100'>{{$item->user_id}}</td>
                <td width='200'>{{$item->subtotal}}</td>
                <td width='200'>{{$item->discount}}</td>
                <td width='200'>{{$item->tax}}</td>
                <td width='200'>{{$item->total}}</td>

                <td width='200'>{{$item->firstname}}</td>
                <td width='200'>{{$item->lastname}}</td>
                <td width='200'>{{$item->mobile}}</td>
                <td width='200'>{{$item->email}}</td>
                
                <td width='200'>{{$item->line1}}</td>
                <td width='200'>{{$item->line2}}</td>
                <td width='200'>{{$item->city}}</td>
                <td width='200'>{{$item->province}}</td>
                <td width='200'>{{$item->country}}</td>
                <td width='200'>{{$item->zipcode}}</td>
                <td width='200'>{{$item->status}}</td>
                <td width='200'>{{$item->is_shipping_different}}</td>
                <td width='200'>{{$item->updated_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

