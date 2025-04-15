@if ($wrapCards && $wrapperBackgroundColor)
    <div class="{{ $wrapperClass }}">
        <div class="o-container">
            @include('cards')
        </div>
    </div>
@else
    @include('cards')
@endif
@if (($wrapCards && $wrapperBackgroundColor) || $cardStyles)
    <style>
        @if ($wrapCards && $wrapperBackgroundColor)
            .{{ $baseClass }}__wrapper {
                background: {{ $wrapperBackgroundColor }};
                position: relative;
                left: 50%;
                width: calc(100vw - var(--scrollbar));
                margin-left: calc(-50vw + calc(var(--scrollbar) / 2));
            }
        @endif
        @if ($cardStyles)
            @foreach ($cardStyles as $cardId => $values)
                .{{ $cardClass }}-{{ $cardId }},
                .{{ $cardClass }}-{{ $cardId }}:hover {
                    background: {{ $values['background'] }} !important;
                    color: {{ $values['color'] }} !important;
                }
            @endforeach
        @endif
    </style>
@endif
