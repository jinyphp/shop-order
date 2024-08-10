<div class="col">
    <div class="product-card animate-underline hover-effect-opacity bg-body rounded">
        {{-- 상품 이미지 --}}
        <div class="position-relative">
            <div class="position-absolute top-0 end-0 z-1 pt-1 pe-1 mt-2 me-2">
                <div class="form-check fs-lg">
                    {{-- <input type="checkbox" class="form-check-input select-card-check" checked> --}}
                    <input type='checkbox' name='ids'
                        value="{{ $item['id'] }}"
                        class="form-check-input select-card-check"
                        wire:model.live="selected">
                </div>
            </div>
            <a class="d-block rounded-top overflow-hidden p-3 p-sm-4" href="#">
                <div class="ratio" style="--cz-aspect-ratio: calc(240 / 258 * 100%)">
                    <img src="{{ $item['image'] }}" alt="{{ $item['product'] }}">
                </div>
            </a>
        </div>

        {{-- 상품 정보 --}}
        <div class="w-100 min-w-0 px-1 pb-2 px-sm-3 pb-sm-3">
            <div class="d-flex align-items-center gap-2 mb-2">
                <div class="d-flex gap-1 fs-xs">
                    {{ $item['average_rating'] }}

                    {{-- @php
                        $averageRating = round($item['average_rating']); // 소수점 반올림
                    @endphp
                    --}}

                    {{-- @for ($i = 0; $i < 5; $i++)
                        <i class="{{ $i < $averageRating ? 'ci-star-filled text-warning' : 'ci-star text-body-tertiary opacity-75' }}"></i>
                    @endfor --}}

                    {{-- 스타점수--}}
                    @for ($i = 0; $i < $item['average_rating']; $i+=20)
                    <i class="ci-star-filled text-warning"></i>
                    @endfor
                    @for( ;$i < 100; $i+=20)
                    <i class="ci-star text-body-tertiary opacity-75"></i>
                    @endfor

                </div>
                <span class="text-body-tertiary fs-xs">
                    {{ number_format($item['average_rating'], 1) }}
                </span>

            </div>
            <h3 class="pb-1 mb-2">
                <a class="d-block fs-sm fw-medium text-truncate" href="#">
                    <span class="animate-target">{{ $item['product'] }}</span>
                </a>
            </h3>
            <div class="d-flex align-items-center justify-content-between">
                <div class="h5 lh-1 mb-0">{{ $item['price'] }}원 <del class="text-body-tertiary fs-sm fw-normal">{{ $item['price'] }}원</del></div>
                <button type="button" class="product-card-button btn btn-icon btn-secondary animate-slide-end ms-2" aria-label="Add to Cart">
                    <i class="ci-shopping-cart fs-base animate-target"></i>
                </button>
            </div>
        </div>

    </div>
</div>
