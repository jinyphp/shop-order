<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>id</th>
        <th width='100'>유저 id</th>
        <th width='100'>부분합</th>
        <th width='100'>할인</th>
        <th width='100'>세금</th>
        <th width='100'>합계</th>

        <th width='200'>이름/성</th>

        <th width='200'>연락처</th>
        <th >주소</th>

        <th width='200'>상태</th>
        <th width='200'>분리배송</th>
        <th width='200'>주문일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='50'>
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->id}}
                    </x-click>
                </td>
                <td width='100'>{{$item->user_id}}</td>
                <td width='100'>{{$item->subtotal}}</td>
                <td width='100'>{{$item->discount}}</td>
                <td width='100'>{{$item->tax}}</td>
                <td width='100'>{{$item->total}}</td>

                <td width='200'>
                    {{$item->firstname}} / {{$item->lastname}}
                </td>


                <td width='200'>
                    <div>{{$item->email}}</div>
                    <div>{{$item->mobile}}</div>

                </td>

                <td>
                    <div>{{$item->line1}}</div>
                    <div>{{$item->line2}}</div>
                    <div>{{$item->city}}</div>
                    <div>{{$item->province}}</div>
                    <div>{{$item->country}}</div>
                    <div>{{$item->zipcode}}</div>
                </td>


                <td width='200'>{{$item->status}}</td>
                <td width='200'>{{$item->is_shipping_different}}</td>
                <td width='200'>{{$item->created_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

