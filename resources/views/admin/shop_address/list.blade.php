<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>이름</th>
        <th width='200'>이메일</th>
        <th width='200'>국가</th>
        <th width='200'>등록일자</th>

    </x-wire-thead>
    <tbody>
        @if(!empty($rows))
            @foreach ($rows as $item)
            {{-- 테이블 리스트 --}}
            <x-wire-tbody-item :selected="$selected" :item="$item">
                <td width='50'>
                    <x-click wire:click="edit({{$item->id}})">
                        {{$item->name}}
                    </x-click>
                </td>
                <td width='200'>{{$item->email}}</td>
                <td width='200'>{{$item->country}}</td>
                <td width='200'>{{$item->created_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>
