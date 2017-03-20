<?php namespace Jiri\JKShop\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Coupons Back-end Controller
 */
class Coupons extends Controller
{
   
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController',
    ];
    
    public $requiredPermissions = ['jiri.jkshop.coupons'];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';    

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Jiri.JKShop', 'jkshop', 'coupons');
    }
}