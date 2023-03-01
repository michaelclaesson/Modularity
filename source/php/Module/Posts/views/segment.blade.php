@if (!$hideTitle && !empty($postTitle))
    @typography([
        'id' => 'mod-posts-' . $ID . '-label',
        'element' => 'h2', 
        'variant' => 'h2', 
        'classList' => ['module-title']
    ])
        {!! $postTitle !!}
    @endtypography
@endif

@if ($preamble)
    @typography([
        'classList' => ['module-preamble', 'u-margin__bottom--3'] 
    ])
        {!! $preamble !!}
    @endtypography
@endif

<div class="o-grid 
    {{ $stretch ? 'o-grid--stretch' : '' }} 
    {{ $noGutter ? 'o-grid--no-gutter' : '' }}" 
    @if (!$hideTitle && !empty($postTitle))
    aria-labelledby="{{ 'mod-posts-' . $ID . '-label' }}"
    @endif
    >
        @foreach($posts as $post) 
         <div class="{{ $loop->first && $highlight_first_column ? $highlight_first_column : $posts_columns }}">
            @segment([
                'layout' => 'card',
                'title' => ($post->showTitle ? $post->post_title : false),
                'meta' => '5 mins read',
                'tags' => $post->tags,
                'image' => $post->thumbnail[0],
                'date' => $post->showDate ? date_i18n(\Modularity\Helper\Date::getDateFormat('date-time'), strtotime($post->post_date)) : false,
                'content' => $post->post_content,
                'buttons' => [['text' => $labels['readMore'], 'href' => $post->link]],
                'containerAware' => true,
                'reverseColumns' => true
            ])
            @endsegment
         </div>
        @endforeach
</div>