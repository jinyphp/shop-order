<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>id</th>
        <th width='200'>이메일</th>
        <th width='200'>제품 id</th>
        <th>제품명</th>
        <th width='200'>이미지</th>
        <th width='200'>만료일자</th>
        <th width='200'>later</th>
        <th width='200'>수정일자</th>
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
                <td width='200'>{{$item->email}}</td>
                <td width='200'>{{$item->product_id}}</td>
                <td>{{$item->product}}</td>
                <td width='200'>{{$item->image}}</td>
                <td width='200'>{{$item->expire}}</td>
                <td width='200'>{{$item->later}}</td>
                <td width='200'>{{$item->updated_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

