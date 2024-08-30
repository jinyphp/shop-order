<x-wire-table style="table-layout: fixed; width: 100%;">
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th style="width: 7%;">cartidx</th>
        <th style="width: 15%;">이메일</th>
        <th style="width: 5%;">제품id</th>
        <th style="width: 10%; word-wrap: break-word;">제품명</th>
        <th style="width: 20%; word-wrap: break-word;">이미지</th>
        <th style="width: 5%; word-wrap: break-word;">옵션</th>
        <th style="width: 8%;">가격</th>
        <th style="width: 5%;">수량</th>
        <th style="width: 5%; word-wrap: break-word;">내용</th>
        <th style="width: 5%;">만료일</th>
        <th style="width: 5%;">later</th>
        <th style="width: 10%;">수정일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td style="width: 7%; overflow: hidden; text-overflow: ellipsis;">
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->cartidx}}
                    </x-click>
                </td>
                <td style="width: 15%; overflow: hidden; text-overflow: ellipsis;">{{$item->email}}</td>
                <td style="width: 5%; overflow: hidden; text-overflow: ellipsis;">{{$item->product_id}}</td>
                <td style="width: 10%; word-wrap: break-word;">{{$item->product}}</td>
                <td style="width: 20%; word-wrap: break-word;">{{$item->image}}</td>
                <td style="width: 5%; word-wrap: break-word;">{{$item->option}}</td>
                <td style="width: 8%; overflow: hidden; text-overflow: ellipsis;">{{$item->price}}</td>
                <td style="width: 5%; overflow: hidden; text-overflow: ellipsis;">{{$item->quantity}}</td>
                <td style="width: 5%; word-wrap: break-word;">{{$item->content}}</td>
                <td style="width: 5%; overflow: hidden; text-overflow: ellipsis;">{{$item->expire}}</td>
                <td style="width: 5%; overflow: hidden; text-overflow: ellipsis;">{{$item->later}}</td>
                <td style="width: 10%; overflow: hidden; text-overflow: ellipsis;">{{$item->updated_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
