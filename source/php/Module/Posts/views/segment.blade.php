@includeWhen((!$hideTitle && !empty($postTitle))|| !empty($titleCTA), 'partials.post-title',
    ['titleCTA' => $titleCTA ?? null]
)
@includeWhen($preamble, 'partials.preamble')

@if($posts)
    <div class="o-grid{{ !empty($stretch) ? ' o-grid--stretch' : '' }} {{ !empty($noGutter) ? ' o-grid--no-gutter' : '' }} {{ (!empty($preamble)||(!$hideTitle && !empty($postTitle))) ? ' u-margin__top--4' : '' }} {{!empty($post->classList) ? implode(' ', $post->classList) : ''}}" 
        @if (!$hideTitle && !empty($postTitle)) aria-labelledby="{{ 'mod-posts-' . $ID . '-label' }}" @endif>
        @foreach ($posts as $post)
            <div class="{{ $posts_columns }}" data-js-item-id="{{$post->id}}" {{!empty($post->attributeList) ? implode(' ', $post->attributeList) : ''}}>
                @include('partials.post.segment')
            </div>
        @endforeach
    </div>

    @include('partials.more')

@endif