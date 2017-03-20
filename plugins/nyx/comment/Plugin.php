<?php namespace Nyx\Comment;

use Backend;
use System\Classes\PluginBase;

/**
 * Comment Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Comment',
            'description' => 'Comment plugin for Rainlab Blog',
            'author'      => 'Dalton Nyx',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * @var array Plugin dependencies
     */
    public $require = ['RainLab.Blog'];

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        \RainLab\Blog\Models\Post::extend(function($model){
            $model->hasMany['Comments'] = ['Nyx\Comment\Models\Comment'];
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        //return []; // Remove this line to activate

        return [
            'Nyx\Comment\Components\CommentForm' => 'commentForm',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'nyx.comment.some_permission' => [
                'tab' => 'Comment',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        //return []; // Remove this line to activate

        return [
            'comment' => [
                'label'       => 'Comments',
                'url'         => Backend::url('nyx/comment/comment'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nyx.comment.*'],
                'order'       => 500,
            ],
        ];
    }
}
