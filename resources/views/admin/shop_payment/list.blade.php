<x-wire-table>
    {{-- 테이블 제목 --}}
    <x-wire-thead>
        <th width='50'>id</th>
        <th width='100'>이름</th>
        <th width='200'>test</th>
        <th width='200'>code</th>
        <th width='200'>payment</th>
        <th width='200'>pg_id</th>
        <th width='200'>pg_password</th>
        <th width='200'>pg_key</th>
        <th width='200'>pg_url</th>
        <th width='200'>pg_url_test</th>
        <th width='200'>descript</th>
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
                <td width='100'>{{$item->name}}</td>
                <td width='200'>{{$item->test}}</td>
                <td width='200'>{{$item->code}}</td>
                <td width='200'>{{$item->payment}}</td>
                <td width='200'>{{$item->pg_id}}</td>
                <td width='200'>{{$item->pg_password}}</td>
                <td width='200'>{{$item->pg_key}}</td>
                <td width='200'>{{$item->pg_url}}</td>
                <td width='200'>{{$item->pg_url_test}}</td>
                <td width='200'>{{$item->descript}}</td>
                <td width='200'>{{$item->updated_at}}</td>
            </x-wire-tbody-item>
            @endforeach
        @endif
    </tbody>
</x-wire-table>

