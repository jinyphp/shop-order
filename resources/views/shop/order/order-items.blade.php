<div class="mt-4">
    <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                @foreach($orderItems as $item)
                <tr>
                    <td style="vertical-align: middle;">
                        <div style="display: inline-block; vertical-align: middle;">
                            <img src="{{ $item->image }}" alt="{{ $item->product }}" style="width: 100px;">
                        </div>
                        <div style="display: inline-block; vertical-align: middle; margin-left: 10px;">
                            <strong class="h5">{{ $item->product }}</strong><br>
                            {{-- 옵션: {{ $item->option }}<br> --}}
                            옵션1: {{ $item->options ? json_encode($item->options) : '없음' }}<br>
                            옵션2: {{ $item->option ?? '없음' }}<br>
                            {{ $item->price }}원 / 수량 {{ $item->quantity }}개
                            @if($item->coupon)
                                <br><span style="color: gray;">{{ $item->coupon }}: {{ number_format($item->coupon_value) }}원</span>
                                <br><strong style="color: orange;">쿠폰적용가: {{ number_format($item->price - ($item->coupon_value ?? 0)) }}원</strong>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- <div class="mt-4">
    <div class="table-responsive">
        <table class="table table-borderless">
            <tbody>
                @foreach($orderItems as $item)
                <tr>
                    <td><img src="{{ $item->image }}" alt="{{ $item->product }}" style="width: 100px;"></td>
                    <td class="h4">{{ $item->product }}</td>
                    <td class="h4">{{ $item->option }}</td>
                    <td class="h4">{{ $item->price }}</td>
                    <td class="h4">{{ $item->quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}

