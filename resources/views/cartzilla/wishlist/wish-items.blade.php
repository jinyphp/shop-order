<div class="row row-cols-2 row-cols-md-3 g-4" id="wishlistSelection">
    @foreach($rows as $item)

        @includeIf($viewCell, ['item' => $item])

    @endforeach
</div>
