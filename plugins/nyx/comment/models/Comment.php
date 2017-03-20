<?php namespace Nyx\Comment\Models;

use Model;

/**
 * Comment Model
 */
class Comment extends Model
{
    use \October\Rain\Database\Traits\Validation;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'nyx_comment_comments';

    public $rules = [
        'title' => 'required',
        'owner' => 'required',
        'email' => 'required',
        'post_id' => 'required'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['id'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'Post' => '\Rainlab\Blog\Models\Post'
    ];

    public $attachOne = [
        'avatar' => 'System\Models\File'
    ];

    public function getPostIdOptions() {
        $posts = \RainLab\Blog\Models\Post::all(['id','title']);
        $postsOptions = [];
        $posts->each(function($post) use (&$postsOptions){
            $postsOptions[$post->id] = $post->title;
        });
        return $postsOptions;
    } 
}
