<?php 
use RainLab\Blog\Models\Post;class Cms58ceb81458e94653298788_1954958071Class extends \Cms\Classes\PageCode
{

public function onStart(){
    $slug = $this->param('slug');
    $this['post'] = Post::where('slug', '=', $slug)
                            ->isPublished()
                            ->with('categories')
                            ->first();
    if( !$this['post'] )
        return Redirect::to('/404');
        
    $this->page->title = $this['post']->title;
}
}
