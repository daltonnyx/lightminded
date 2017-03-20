<?php namespace Nyx\Comment\Components;

use Cms\Classes\ComponentBase;
use RainLab\Blog\Models\Post;
use Nyx\Comment\Models\Comment;

class CommentForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Comment Form Component',
            'description' => 'A form for user comment on Post'
        ];
    }

    public function defineProperties()
    {
        return [
            'layout' => [
                'title' => 'Layout',
                'type' => 'dropdown',
                'placeholder' => 'Select a layout',
                'options' => ['layout_a' => 'Layout A','layout_b' => 'Layout B']
            ]
        ];
    }

    public function comments() {
        $comments = [];
        $post_slug = $this->param('slug');
        $current_post = Post::select('id')->where('slug', '=', $post_slug)
                                    ->isPublished()
                                    ->first();
        $commentData = Comment::where('post_id', '=', $current_post['id'])
                                ->orderBy('created_at','desc')
                                ->get();

        return $commentData;
    }
}
