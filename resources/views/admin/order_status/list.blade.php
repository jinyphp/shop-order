<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>id</th>
        <th width='200'>code</th>
        <th>이름</th>
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
                <td width='200'>{{$item->code}}</td>
                <td>{{$item->name}}</td>
                <td width='200'>{{$item->updated_at}}</td>

            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

