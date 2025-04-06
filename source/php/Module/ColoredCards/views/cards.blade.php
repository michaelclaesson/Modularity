<div class="o-grid">
    @foreach ($cards as $card)
        <div class="{{ $columnClass }}">
            @include('partials.card')
        </div>
    @endforeach
</div>
