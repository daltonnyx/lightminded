<?php

namespace Jiri\JKShop;

use Backend;
use System\Classes\PluginBase;
use Event;
use Validator;
use App;
use Illuminate\Foundation\AliasLoader;
use Config;
use File;
use Route;
use Redirect;
use Yaml;

/**
 * JKShop Plugin Information File
 */
class Plugin extends PluginBase {
    
    /**
     * @var array Plugin dependencies
     */
    public $require = ['RainLab.User'];
    

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails() {
        return [
            'name' => 'jiri.jkshop::lang.plugin.name',
            'description' => 'jiri.jkshop::lang.plugin.description',
            'author' => 'Jiri Kubak',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents() {
        return [
            'Jiri\JKShop\Components\ProductsByCategory' => 'myProducts',
            'Jiri\JKShop\Components\ProductsByBrand' => 'myProductsByBrand',
            'Jiri\JKShop\Components\ProductDetail' => 'myProductDetail',
            'Jiri\JKShop\Components\ProductsList' => 'myProductsList',
            'Jiri\JKShop\Components\MyOrders' => 'myOrders',
            'Jiri\JKShop\Components\MyOrderDetail' => 'myOrderDetail',
            'Jiri\JKShop\Components\Basket' => 'myBasket',
            'Jiri\JKShop\Components\BrandDetails' => 'myBrandDetails',
            'Jiri\JKShop\Components\BrandsList' => 'myBrandsList',
            'Jiri\JKShop\Components\BreadcrumbsCategory' => 'myBreadcrumbsCategory',
            'Jiri\JKShop\Components\BreadcrumbsProduct' => 'myBreadcrumbsProduct',
            'Jiri\JKShop\Components\PaymentGateway' => 'myPaymentGateway',
            
            'Jiri\JKShop\Components\CustomPaymentPaypalIPN' => 'myCustomPaymentPaypalIPN',
            'Jiri\JKShop\Components\CustomPaymentStripeCheckout' => 'myCustomPaymentStripeCheckout',
            'Jiri\JKShop\Components\CustomPaymentCashOnDelivery' => 'myCustomPaymentCashOnDelivery',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions() {
        return [
            'jiri.jkshop.access_settings' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_settings' ],
            
            'jiri.jkshop.orders' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_orders' ],
            'jiri.jkshop.products' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_products' ],
            'jiri.jkshop.categories' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_categories' ],
            'jiri.jkshop.brands' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_brands' ],
            'jiri.jkshop.taxes' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_taxes' ],
            'jiri.jkshop.carriers' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_carriers' ],
            'jiri.jkshop.orderstatuses' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_orderstatuses' ],
            'jiri.jkshop.properties' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_properties' ],
            'jiri.jkshop.coupons' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_coupons' ],
            'jiri.jkshop.paymentgateways' => [ 'tab' => 'jiri.jkshop::lang.plugin.name', 'label' => 'jiri.jkshop::lang.plugin.access_paymentgateways' ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation() {
        return [
            'jkshop' => [
                'label' => 'jiri.jkshop::lang.plugin.main_menu',
                'url' => Backend::url('jiri/jkshop/orders'),
                'icon' => 'icon-shopping-cart',
                'permissions' => ['jiri.jkshop.*'],
                'order' => 69,
                'sideMenu' => [
                    'orders' => [
                        'label' => 'jiri.jkshop::lang.orders.menu_label',
                        'icon' => 'icon-money',
                        'url' => Backend::url('jiri/jkshop/orders'),
                        'permissions' => ['jiri.jkshop.orders'],
                    ],
                    'products' => [
                        'label' => 'jiri.jkshop::lang.products.menu_label',
                        'icon' => 'icon-cube',
                        'url' => Backend::url('jiri/jkshop/products'),
                        'permissions' => ['jiri.jkshop.products'],
                    ],
                    'categories' => [
                        'label' => 'jiri.jkshop::lang.categories.menu_label',
                        'icon' => 'icon-list-alt',
                        'url' => Backend::url('jiri/jkshop/categories'),
                        'permissions' => ['jiri.jkshop.categories'],
                    ],
                    'brands' => [
                        'label' => 'jiri.jkshop::lang.brands.menu_label',
                        'icon' => 'icon-copyright',
                        'url' => Backend::url('jiri/jkshop/brands'),
                        'permissions' => ['jiri.jkshop.brands'],
                    ],
                    'taxes' => [
                        'label' => 'jiri.jkshop::lang.taxes.menu_label',
                        'icon' => 'icon-random',
                        'url' => Backend::url('jiri/jkshop/taxes'),
                        'permissions' => ['jiri.jkshop.taxes'],
                    ],
                    'carriers' => [
                        'label' => 'jiri.jkshop::lang.carriers.menu_label',
                        'icon' => 'icon-truck',
                        'url' => Backend::url('jiri/jkshop/carriers'),
                        'permissions' => ['jiri.jkshop.carriers'],
                    ],
                    'orderstatuses' => [
                        'label' => 'jiri.jkshop::lang.orderstatuses.menu_label',
                        'icon' => 'icon-tasks',
                        'url' => Backend::url('jiri/jkshop/orderstatuses'),
                        'permissions' => ['jiri.jkshop.orderstatuses'],
                    ],
                    'properties' => [
                        'label' => 'jiri.jkshop::lang.properties.menu_label',
                        'icon' => 'icon-cogs',
                        'url' => Backend::url('jiri/jkshop/properties'),
                        'permissions' => ['jiri.jkshop.properties'],
                    ],
                    'coupons' => [
                        'label' => 'jiri.jkshop::lang.coupons.menu_label',
                        'icon' => 'icon-ticket',
                        'url' => Backend::url('jiri/jkshop/coupons'),
                        'permissions' => ['jiri.jkshop.coupons'],
                    ],
                    'paymentgateways' => [
                        'label' => 'jiri.jkshop::lang.paymentgateways.menu_label',
                        'icon' => 'icon-ticket',
                        'url' => Backend::url('jiri/jkshop/paymentgateways'),
                        'permissions' => ['jiri.jkshop.paymentgateways'],
                    ]
                ]
            ]
        ];
    }

    public function registerSettings() {
        return [
            'settings' => [
                'label' => 'jiri.jkshop::lang.settings.menu_label',
                'description' => 'jiri.jkshop::lang.settings.description',
                'category' => 'jiri.jkshop::lang.settings.category',
                'icon' => 'icon-shopping-cart',
                'class' => 'Jiri\JKShop\Models\Settings',
                'order' => 69,
                'keywords' => 'security shop',
                'permissions' => ['jiri.jkshop.access_settings']
            ]
        ];
    }

    /**
     * Main boot function
     */
    public function boot() {
        $this->bootMenuItem();
        $this->bootValidatorExtend();
        $this->bootRainlabUserExtend();
        $this->bootRainlabTranslateExtend();
        
        $jkshopSetting = \Jiri\JKShop\Models\Settings::instance();
        $alias = AliasLoader::getInstance();

        // -----------------------------------------------------------
        // DomPDF
        // -----------------------------------------------------------
        Config::set('dompdf.config_file', plugins_path() . "/jiri/jkshop/vendor/dompdf/dompdf/dompdf_config.inc.php");
        \App::register('Barryvdh\DomPDF\ServiceProvider');
        $alias->alias('PDF', 'Barryvdh\DomPDF\Facade');
        $this->createFontDirectory();
        // -----------------------------------------------------------
        
        
        // -----------------------------------------------------------
        // Omnipay
        // -----------------------------------------------------------
        \App::register('Ignited\LaravelOmnipay\LaravelOmnipayServiceProvider');
        $alias->alias('Omnipay', 'Ignited\LaravelOmnipay\Facades\OmnipayFacade');
        // add extra gateways
        $factory = \Omnipay\Omnipay::getFactory();
        $factory->register("TwoCheckoutPlus");
        $factory->register("TwoCheckoutPlus_Token");
        // -----------------------------------------------------------
    }

    /**
     * Create directory for cache fonts
     */
    private function createFontDirectory() {
        $config = Config::get('dompdf.defines');

        if (!File::exists($config['DOMPDF_FONT_CACHE'])) {
            File::makeDirectory($config['DOMPDF_FONT_CACHE']);
        }
    }

    /**
     * Add menu item support
     */
    private function bootMenuItem() {
        Event::listen('pages.menuitem.listTypes', function() {
            return [
                'jiri-jkshop-categiries' => 'All JK Shop Categories',
                'jiri-jkshop-brands' => 'All JK Shop Brands',
                'jiri-jkshop-products' => 'All JK Shop Products',
            ];
        });

        Event::listen('pages.menuitem.getTypeInfo', function($type) {
            if ($type == 'jiri-jkshop-categiries') {
                return Models\Category::getMenuTypeInfo($type);
            }
            if ($type == 'jiri-jkshop-brands') {
                return Models\Brand::getMenuTypeInfo($type);
            }
            if ($type == 'jiri-jkshop-products') {
                return Models\Product::getMenuTypeInfo($type);
            }
        });

        Event::listen('pages.menuitem.resolveItem', function($type, $item, $url, $theme) {
            if ($type == 'jiri-jkshop-categiries') {
                return Models\Category::resolveMenuItem($item, $url, $theme);
            }
            if ($type == 'jiri-jkshop-brands') {
                return Models\Brand::resolveMenuItem($item, $url, $theme);
            }
            if ($type == 'jiri-jkshop-products') {
                return Models\Product::resolveMenuItem($item, $url, $theme);
            }
        });
    }

    /**
     * Extend validator
     */
    private function bootValidatorExtend() {
        // EAN 13 validator
        Validator::extend('ean13', function($attribute, $barcode, $parameters) {
            // https://principeorazio.wordpress.com/2012/03/23/verify-ean-13-with-php/
            // check to see if barcode is 13 digits long
            if (!preg_match("/^[0-9]{13}$/", $barcode)) {
                return false;
            }

            $digits = $barcode;

            // 1. Add the values of the digits in the 
            // even-numbered positions: 2, 4, 6, etc.
            $even_sum = $digits[1] + $digits[3] + $digits[5] +
                    $digits[7] + $digits[9] + $digits[11];

            // 2. Multiply this result by 3.
            $even_sum_three = $even_sum * 3;

            // 3. Add the values of the digits in the 
            // odd-numbered positions: 1, 3, 5, etc.
            $odd_sum = $digits[0] + $digits[2] + $digits[4] +
                    $digits[6] + $digits[8] + $digits[10];

            // 4. Sum the results of steps 2 and 3.
            $total_sum = $even_sum_three + $odd_sum;

            // 5. The check character is the smallest number which,
            // when added to the result in step 4, produces a multiple of 10.
            $next_ten = (ceil($total_sum / 10)) * 10;
            $check_digit = $next_ten - $total_sum;

            // if the check digit and the last digit of the 
            // barcode are OK return true;
            if ($check_digit == $digits[12]) {
                return true;
            }

            return false;
        });
    }
    
    /**
     * Extend all my class if rainlab translate exist
     * - $translatable fields are defined in class
     */
    private function bootRainlabTranslateExtend() {

//        if (class_exists("\RainLab\Translate\Behaviors\TranslatableModel")) {
//            // Product
//            Models\Product::extend(function($model) { $model->implement[] = 'RainLab.Translate.Behaviors.TranslatableModel'; });
//        }

    }
    
    /**
     * Extend plugin Rainlab.User
     */
    private function bootRainlabUserExtend() {
        
        if (class_exists("\RainLab\User\Models\User")) {
        
            \RainLab\User\Models\User::extend(function($model) {
                $model->addFillable([
                    "jkshop_ds_first_name",
                    "jkshop_ds_last_name",
                    "jkshop_ds_address",
                    "jkshop_ds_address_2",
                    "jkshop_ds_postcode",
                    "jkshop_ds_city",
                    "jkshop_ds_country",
                    "jkshop_ds_county",
                    // Invoice address
                    "jkshop_is_first_name",
                    "jkshop_is_last_name",
                    "jkshop_is_address",
                    "jkshop_is_address_2",
                    "jkshop_is_postcode",
                    "jkshop_is_city",
                    "jkshop_is_country",
                    "jkshop_is_county",            

                    // Contact
                    "jkshop_contact_email",
                    "jkshop_contact_phone",
                ]);
            });
            \RainLab\User\Controllers\Users::extendFormFields(function($widget) {
                // Prevent extending of related form instead of the intended User form
                if (!$widget->model instanceof \RainLab\User\Models\User) {
                    return;
                }
                $configFile = __DIR__ . '/models/rainlabuser/fields.yaml';
                $config = Yaml::parse(File::get($configFile));
                $widget->addTabFields($config);
            });
        }
        
    }    
    
    public function registerMailTemplates()
    {
        return [
            'jiri.jkshop::mail.cancel'                               => 'Cancel Order.',
            'jiri.jkshop::mail.payment-received'                     => 'Payment Received.',
            'jiri.jkshop::mail.new-order-paypal'                     => 'New Order - PayPal.',
            'jiri.jkshop::mail.new-order-cash-on-delivery'           => 'New Order - Cash on Delivery.',
            'jiri.jkshop::mail.new-order-bank-tranfer'               => 'New Order - Bank Tranfer.',
            'jiri.jkshop::mail.expedited-order-cash-on-delivery'     => 'Expedited Order - Cash on Delivery.',
            'jiri.jkshop::mail.expedited-order'                      => 'Expedited Order.',

        ];
    }    

}
