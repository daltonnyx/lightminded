<?php namespace Nyx\PostExtend;

use App;
use Backend;
use Event;
use System\Classes\PluginBase;
use RainLab\Blog\Models\Post;

/**
 * PostExtend Plugin Information File
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
            'name'        => 'Post Extend',
            'description' => 'Extend functionality for Rainlab Post',
            'author'      => 'Nyx',
            'icon'        => 'icon-leaf'
        ];
    }

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

		if(!App::runningInBackend()){
			return;
		}
		Event::listen('backend.form.extendFields',function($widget){
			if(!$widget->model instanceof \RainLab\Blog\Models\Post) {
				return;	
			}
			$widget->addSecondaryTabFields([
				'buybox' => [
					'label' => 'Buy box content',
					'tab' => 'rainlab.blog::lang.post.tab_manage',
					'type' => 'RainLab\Blog\FormWidgets\BlogMarkdown'
				],
				'header_enabled' => [
					'label' => 'Is Enabled?',
					'tab' => 'Header',
					'type' => 'checkbox',
					'default' => 'false',
					'span' => 'left'
				],
				'header_mobile_only' => [
					'label' => 'Mobile only?',
					'tab' => 'Header',
					'type' => 'checkbox',
					'default' => 'true',
					'span' => 'right'
				],
				'header' => [
					'label' => 'Advertorial Header',
					'tab' => 'Header',
					'type' => 'RainLab\Blog\FormWidgets\BlogMarkdown'
				],
				'footer_enabled' => [
					'label' => 'Is Enabled?',
					'tab' => 'Footer',
					'type' => 'checkbox',
					'default' => 'false',
					'span' => 'left'
				],
				'footer_mobile_only' => [
					'label' => 'Mobile only?',
					'tab' => 'Footer',
					'type' => 'checkbox',
					'default' => 'false',
					'span' => 'right'
				],
				'footer_show_position' => [
					'label' => 'Scroll Position (%)',
					'tab' => 'Footer',
					'type' => 'number',
					'default' => '50'
				],
				'sticky_footer' => [
					'label' => 'Sticky footer',
					'tab' => 'Footer',
					'type' => 'RainLab\Blog\FormWidgets\BlogMarkdown'
				]
			]);
		});	
		Event::listen('backend.page.beforeDisplay',function($controller, $action, $params){
			if(!$controller instanceof \RainLab\Blog\Controllers\Posts) {
				return;
			}
			$controller->addCss("/plugins/nyx/postextend/assets/css/predefined.css");
		});
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Nyx\PostExtend\Components\MyComponent' => 'myComponent',
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
            'nyx.postextend.some_permission' => [
                'tab' => 'PostExtend',
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
        return []; // Remove this line to activate

        return [
            'postextend' => [
                'label'       => 'PostExtend',
                'url'         => Backend::url('nyx/postextend/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['nyx.postextend.*'],
                'order'       => 500,
            ],
        ];
    }
}
