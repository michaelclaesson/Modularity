@card([
    'heading' => $post->post_title,
    // 'subHeading' => 'subheading'
    'classList' => [$classes, 'u-color__text--info'],
    'date' => "Y-m-d H:i",
    'image' => ['src' => $post->thumbnail[0], 'alt' => $post->post_title],
    'imageFirst' => true,
    // 'link' => $post->link,
    'containerAware' => true,
    'hasAction' => true,
    'tags' => $post->tags,
    'context' => ['module.posts.slider'],
    ])
@endcard