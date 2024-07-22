<div class="container mt-4">
    <h1 class="mb-4">내 위시리스트</h1>
    <h3>총 {{ $wishes->count() }}개</h3>
    <div class="row">
        @foreach($wishes as $wish)
            <div class="col-md-3 mb-4">
                <div class="card h-150">
                    <img src="{{ $wish->image }}" class="card-img-top" alt="{{ $wish->product }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $wish->product }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
