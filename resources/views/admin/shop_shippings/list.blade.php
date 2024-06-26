<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>orderidx</th>
        <th width='100'>주문번호</th>
        <th width='100'>이름</th>
        <th width='100'>성</th>
        <th width='100'>핸드폰번호</th>
        <th width='100'>이메일</th>
        <th width='100'>line1</th>
        <th width='100'>line2</th>
        <th width='100'>도시</th>
        <th width='100'>주</th>
        <th width='100'>나라</th>
        <th width='100'>우편번호</th>
        <th width='200'>수정일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='50'>
                    {{$item->orderidx}}
                </td>

                <td width='100'>{{$item->order_id}}</td>
                <td width='100'>{{$item->firstname}}</td>
                <td width='100'>{{$item->lastname}}</td>
                <td width='100'>{{$item->mobile}}</td>
                <td width='100'>{{$item->email}}</td>
                <td width='100'>{{$item->line1}}</td>
                <td width='100'>{{$item->line2}}</td>
                <td width='100'>{{$item->city}}</td>
                <td width='100'>{{$item->province}}</td>
                <td width='100'>{{$item->country}}</td>
                <td width='100'>{{$item->zipcode}}</td>
                <td width='200'>{{$item->updated_at}}</td>


            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

