<?php

namespace Modularity\Module\Posts\TemplateController;

class AbstractController
{
    protected $hookName = 'index';

    protected function anyPostHasImage($posts)
    {
        if (!is_array($posts)) {
            return false;
        }

        foreach ($posts as $post) {
            if (!empty($post->thumbnail) && !isset($post->thumbnail['src'])) {
                return true;
            }
        }
        return false;
    }

    public function preparePosts()
    {
        foreach ($this->data['posts'] as $post) {
            $this->setPostFlags($post);
        }
    }

    /**
     * Booleans for hiding/showing stuff
     */
    public function setPostFlags(&$post)
    {
        // Booleans for hiding/showing stuff
        $post->showExcerpt  = in_array('excerpt', $this->data['posts_fields']);
        $post->showTitle    = in_array('title', $this->data['posts_fields']);
        $post->showImage    = in_array('image', $this->data['posts_fields']);
        $post->showDate     = in_array('date', $this->data['posts_fields']);
        $post->attributeList = !empty($post->attributeList) ? $post->attributeList : [];

        /* Handle purposes */
        if (!empty($post->location) && !empty($post->location['pin'])) {
            $post->attributeList['data-js-map-location'] = json_encode($post->location['pin']);
        }

        if ($post->purpose == 'event') {
            $post->showDate = true;
            $eventOccasions = get_post_meta($post->id, 'occasions_complete', true);
            if (!empty($eventOccasions)) {
                $post->postDate = $eventOccasions[0]['start_date'];
                $post->dateBadge = true;
            } else {
                $post->postDate = false;
            }
        } 

        if (empty($post->showDate)) {
            $post->postDate = false;
        }
    }
}
