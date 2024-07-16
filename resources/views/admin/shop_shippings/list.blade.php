<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>

        <th width='200'>주문번호</th>
        <th width='300'>주문자</th>
        <th>주소</th>
        <th width='200'>등록일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='100'>
                    <div>{{$item->order_id}}</div>
                    <div>{{$item->orderidx}}</div>
                </td>
                <td width='300'>
                    <div>{{$item->firstname}} / {{$item->lastname}}</div>
                    <div>{{$item->mobile}}</div>
                    <div>{{$item->email}}</div>
                </td>
                <td>
                    <ul>
                        <li>{{$item->line1}}</li>
                        <li>{{$item->line2}}</li>
                        <li>{{$item->city}}</li>
                        <li>{{$item->province}}</li>
                        <li>{{$item->country}}</li>
                        <li>{{$item->zipcode}}</li>
                    </ul>
                </td>

                <td width='200'>
                    {{$item->created_at}}
                </td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

