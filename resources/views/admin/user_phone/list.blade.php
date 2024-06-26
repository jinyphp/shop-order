<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>유저id</th>
        <th>이메일</th>
        <th>전화번호</th>
        <th width='200'>등록일자</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='50'>
                    {{$item->user_id}}
                </td>
                <td>
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->email}}
                    </x-click>
                </td>
                <td>
                    {{$item->phone}}
                </td>
                <td width='200'>{{$item->created_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
