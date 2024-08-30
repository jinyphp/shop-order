<x-wire-table style="table-layout: fixed; width: 100%;">
    <x-wire-thead>
        <th style="width: 5%;">id</th>
        <th style="width: 20%;">이메일</th>
        <th style="width: 10%;">제품 id</th>
        <th style="width: 25%; word-wrap: break-word;">제품명</th>
        <th style="width: 10%;">가격</th>
        <th style="width: 20%; word-wrap: break-word;">이미지</th>
        <th style="width: 10%;">만료일자</th>
        <th style="width: 10%;">later</th>
        <th style="width: 10%;">수정일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td style="overflow: hidden; text-overflow: ellipsis;">{{$item->id}}</td>
                <td style="overflow: hidden; text-overflow: ellipsis;">{{$item->email}}</td>
                <td style="overflow: hidden; text-overflow: ellipsis;">{{$item->product_id}}</td>
                <td style="word-wrap: break-word;">{{$item->product}}</td>
                <td style="overflow: hidden; text-overflow: ellipsis;">{{$item->price}}</td>
                <td style="word-wrap: break-word;">{{$item->image}}</td>
                <td style="overflow: hidden; text-overflow: ellipsis;">{{$item->expire}}</td>
                <td style="overflow: hidden; text-overflow: ellipsis;">{{$item->later}}</td>
                <td style="overflow: hidden; text-overflow: ellipsis;">{{$item->updated_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
