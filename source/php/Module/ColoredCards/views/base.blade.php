@if ($wrapCards)
    <div class="{{ $wrapperClass }}">
        <div class="o-container">
            @include('cards')
        </div>
    </div>
    <style>
        .{{ $baseClass }}__wrapper {
            background: {{ $wrapperBackgroundColor }};
            position: relative;
            left: 50%;
            width: calc(100vw - var(--scrollbar));
            margin-left: calc(-50vw + calc(var(--scrollbar) / 2));
        }
    </style>
@else
    @include('cards')
@endif
