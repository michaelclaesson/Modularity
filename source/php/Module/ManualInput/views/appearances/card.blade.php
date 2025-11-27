@element([
    'attributeList' => $input['attributeList'] ?? [],
    'classList'     => array_merge($input['classList'] ?? [], [$input['columnSize']])
])
    @card([
        'link'              => $input['link'],
        'linkText'          => isset($input['linkText']) ? $input['linkText'] : '',
        'heading'           => $input['title'],
        'context'           => $context,
        'content'           => $input['content'],
        'image'             => $input['image'],
        'containerAware'    => !$disableLayoutShift,
        'classList'         => array_merge($input['classList'] ?? [], ['u-height--100']),
        'hasPlaceholder'    => $anyItemHasImage,
        'headingAboveImage' => isset($titleAboveImage) ? $titleAboveImage : false,
        'icon'              => $input['icon'] ? [
            'icon' => $input['icon'],
            'size' => 'md',
            'color' => 'black'
        ] : null
    ])
    @endcard
    @if (!empty($input['customBackgroundColor']) && !empty($input['customTextColor']))
        <style>
            #{{ $input['id'] }} {
                --c-card-color-background: var({{ $input['customBackgroundColor'] }});
                color: {{ $input['customTextColor'] }};
            }

            #{{ $input['id'] }} a.c-card:hover, #{{ $input['id'] }} a.c-card:focus {
                background-color: color-mix(in srgb, var(--c-card-color-background, #ededed) 90%, white 10%);
            }
        </style>
    @endif
@endelement
