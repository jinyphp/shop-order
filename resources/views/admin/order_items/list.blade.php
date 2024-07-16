<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>product_id</th>
        <th width='100'>order_id</th>
        <th width='100'>price</th>
        <th width='100'>quantity</th>
        <th width='200'>수정일자</th>
    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td >
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->product_id}}
                    </x-click>
                </td>
                <td width='100'>{{$item->order_id}}</td>
                <td width='100'>{{$item->price}}</td>
                <td width='100'>{{$item->quantity}}</td>
                <td width='200'>{{$item->updated_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

