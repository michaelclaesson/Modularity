@card([
    'link' => $card['link'] ? $card['link']['url'] : false
])
    <div class="{{ $cardClass }}" style="background-color: pink;">
        <div class="{{ $cardClass }}__heading">
            @typography([
                'element' => 'h2',
                'variant' => 'h3'
            ])
                {{ $card['heading'] }}
            @endtypography
        </div>
        @if ($card['image'])
            <div class="{{ $cardClass }}__image u-margin__y--3">
                @image([
                    'src' => $card['image']
                ])
                @endimage
            </div>
        @endif
        @if ($card['content'])
            <div class="{{ $cardClass }}__content">
                {!! $card['content'] !!}
            </div>
        @endif
        @if ($card['link'])
            <div class="{{ $cardClass }}__read-more">
                @typography([
                    'classList' => ['u-display--flex', 'u-align-items--center', 'u-gap-1'],
                    'variant' => 'bold'
                ])
                    {{ $card['link']['title'] }}
                    @icon([
                        'icon' => 'trending_flat',
                        'size' => 'lg'
                    ])
                    @endicon
                @endtypography
            </div>
        @endif
    </div>
@endcard
