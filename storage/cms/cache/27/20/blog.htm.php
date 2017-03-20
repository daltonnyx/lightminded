<?php 
use RainLab\Blog\Models\Post;class Cms58ce90e4d4156606848653_683895851Class extends \Cms\Classes\PageCode
{

public function onStart(){
    $this['posts'] = Post::isPublished()
					    ->orderBy('published_at', 'desc')
					    ->take(5)
					    ->with('categories')
					    ->get();
}
}
