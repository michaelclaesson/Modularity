@if ($wrapCards)
    <div class="{{ $wrapperClass }}">
        <div class="o-container">
            @include('cards')
        </div>
    </div>
    <style>
        .{{ $baseClass }}__wrapper {
            @if ($wrapperBackgroundColor)
                background: {{ $wrapperBackgroundColor }};
            @endif
            position: relative;
            left: 50%;
            width: calc(100vw - var(--scrollbar));
            margin-left: calc(-50vw + calc(var(--scrollbar) / 2));
        }
    </style>
@else
    @include('cards')
@endif
<style>
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
