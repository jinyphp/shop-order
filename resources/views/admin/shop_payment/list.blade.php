<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>id</th>
        <th width='200'>이름</th>
        <th width='100'>test</th>
        <th width='100'>code</th>
        <th width='200'>payment</th>
        <th>pg</th>
        <th width='200'>등록일자</th>
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
                <td width='200'>{{$item->name}}</td>
                <td width='100'>{{$item->test}}</td>
                <td width='100'>{{$item->code}}</td>
                <td width='200'>{{$item->payment}}</td>

                <td >
                    <div>id: {{$item->pg_id}}</div>
                    <div>password: {{$item->pg_password}}</div>
                    <div>key: {{$item->pg_key}}</div>

                    <div>pg_url: {{$item->pg_url}}</div>
                    <div>pg_url_test: {{$item->pg_url_test}}</div>
                    <div>descript: {{$item->descript}}</div>
                </td>

                <td width='200'>{{$item->created_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

