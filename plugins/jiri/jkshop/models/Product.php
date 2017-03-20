<?php namespace Jiri\JKShop\Models;

use Model;
use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;
use Lang;

/**
 * Product Model
 */
class Product extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jiri_jkshop_products';
    
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'title' => 'required|between:2,255',
        'slug' => [
            'required',
            'alpha_dash',
            'between:1,255',
            'unique:jiri_jkshop_products',
        ],        
        'ean_13'   => 'numeric|ean13',
        'default_category' => 'required',
        'retail_price_with_tax' => 'numeric|required',
        
    ];    
    public $customMessages = [
        'ean13' => 'EAN 13 format error'
    ];
    
    /**
     * TranslatableModel
     *
     * @var type 
     */
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = [
        'title', 
        'short_description', 
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
    
    
    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'title',
        'slug',
        'ean_13',
        'barcode',
        'active',
        'on_sale',

        'visibility',
        'available_for_order',
        'show_price',
        'condition',

        'short_description',
        'description',

        'brand',

        'pre_tax_wholesale_price',
        'pre_tax_retail_price',
        'tax',
        'retail_price_with_tax',


        'meta_title',
        'meta_keywords',
        'meta_description',            

        'default_category',

        // Shipping
        'package_width',
        'package_height',
        'package_depth',
        'package_weight',
        'additional_shipping_fees',

        // Quantities
        'quantity',
        'when_out_of_stock',
        'minimum_quantity',
        'availability_date',

        'customization',   
        
        'accessories',
        'featured',
        'categories',
        
        'individual_prices',
    ];
    
    protected $jsonable = ['customization'];
    
    protected $dates = ['availability_date'];


    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'individual_prices' => [
            'Jiri\JKShop\Models\ProductUserPrice',
            'delete' => true,
        ]        
    ];
    public $belongsTo = [
        'tax' => [
            'Jiri\JKShop\Models\Tax', 
            'key' => 'tax_id'
        ],
        'brand' => [
            'Jiri\JKShop\Models\Brand', 
            'key' => 'brand_id'
        ],
        'default_category' => [
            'Jiri\JKShop\Models\Category', 
            'key' => 'default_category_id'
        ],
    ];
    public $belongsToMany = [
        'accessories' => [
            'Jiri\JKShop\Models\Product',
            'table'    => 'jiri_jkshop_products_accessories',
            'key'      => 'product_id',
            'otherKey' => 'accessory_id'
        ],
        'featured' => [
            'Jiri\JKShop\Models\Product',
            'table'    => 'jiri_jkshop_products_featured',
            'key'      => 'product_id',
            'otherKey' => 'featured_id'
        ],   
        'categories' => [
            'Jiri\JKShop\Models\Category',
            'table'    => 'jiri_jkshop_products_categories',
            'key'      => 'product_id',
            'otherKey' => 'category_id'
        ],
        'properties' => [
            'Jiri\JKShop\Models\Property',
            'table'    => 'jiri_jkshop_products_properties',
            'key'      => 'product_id',
            'otherKey' => 'property_id'
        ],
        'propertyOptions' => [
            'Jiri\JKShop\Models\PropertyOption',
            'table'    => 'jiri_jkshop_products_options',
            'key'      => 'product_id',
            'otherKey' => 'option_id',
            'pivot' => ['title', 'description', 'price_difference_with_tax', 'image'],
            'pivotModel' => 'Jiri\JKShop\Models\ProductPropertyOptionPivot',            
        ],        
    ];
  
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [
        'images' => 'System\Models\File',
        'attachments' => 'System\Models\File',
    ];

    /*
     * Before save model
     * 
     */
    public function beforeSave() {
        
        // url is help property - only for run
        unset($this->url);
    }

    
    public static function getMenuTypeInfo($type)
    {
        $result = [
            'dynamicItems' => true
        ];
        
        
        // ------------------------------------------------------------------
        // Select page with components categories
        // ------------------------------------------------------------------
        $theme = Theme::getActiveTheme();

        $pages = CmsPage::listInTheme($theme, true);
        $cmsPages = [];
        foreach ($pages as $page) {
//            if (!$page->hasComponent('blogPosts')) {
//                continue;
//            }
//
//            /*
//             * Component must use a category filter with a routing parameter
//             * eg: categoryFilter = "{{ :somevalue }}"
//             */
//            $properties = $page->getComponentProperties('blogPosts');
//            if (!isset($properties['categoryFilter']) || !preg_match('/{{\s*:/', $properties['categoryFilter'])) {
//                continue;
//            }
//
            $cmsPages[] = $page;
        }

        $result['cmsPages'] = $cmsPages;        
        // ------------------------------------------------------------------
        
        
        // dynamicItems only
        return $result;
    }
    
    public static function resolveMenuItem($item, $url, $theme)
    {
        $result['items'] = array();
        
        // --------------------------------------------------------------------
        // All 
        $products = \Jiri\JKShop\Models\Product::where("active",1)->orderBy("title", "asc")->get();

        $items = array();
        foreach ($products as $product) {
            
            // create URL
            if ($item->cmsPage) {
                $urlPage = CmsPage::url($item->cmsPage, ["slug" => $product->slug]);
            } else {
                $urlPage = URL::to("/product/".$product->slug);
            }        
            
            $items[] = [
                'url' => $urlPage,
                'isActive' => ($url == $urlPage),
                'title' => $product->title,
                'mtime' => $product->updated_at,
            ];              
        }
        $result['items'] = $items;
        // --------------------------------------------------------------------

        return $result;   
    }  
    
    
    /**
     * Sets the "url" attribute with a URL to this object
     * @param string $pageName
     * @param Cms\Classes\Controller $controller
     */
    public function setUrl($pageName, $controller)
    {
        $params = [
            'slug' => $this->slug,
        ];

        return $this->url = $controller->pageUrl($pageName, $params);
    }
    
    
    /**
     * Get Final Price
     * 
     * @param type $inPropertyOptions - property options - use for price differences
     * @return type
     */
    public function getFinalPrice($inPropertyOptions = [], $coupon = null, &$outCurrentDiscount = 0) {
        $price = $this->retail_price_with_tax;
        $indPrice = null;
        $saleOnCategoryPrice = null;
        
        // property options - price differences
        $productPropertyOptions = $this->getProductPropertyOptions($inPropertyOptions);
        foreach ($productPropertyOptions as $productPropertyOption) {
            // price
            if (($productPropertyOption->pivot["price_difference_with_tax"]) && ($productPropertyOption->pivot["price_difference_with_tax"] != "")) {
                $price = $price + $productPropertyOption->pivot["price_difference_with_tax"];
            }
        }
        $standardPrice = $price;
        
        
        
        if (class_exists("\RainLab\User\Models\User")) {
            $user = \RainLab\User\Facades\Auth::getUser();
            if (isset($user)) {
                // compute sale on category
                $categoryUserSales = CategoryUserSale::whereIn("category_id",$this->categories()->lists("id", "id"))->where("user_id", $user->id)->orderBy("sale", "desc")->first();
                if (isset($categoryUserSales)) {
                    $saleOnCategoryPrice = $this->retail_price_with_tax / 100 * (100 - $categoryUserSales->sale);
                }
                
                // compute individual price
                $indPriceObj = $this->individual_prices()->where("user_id", $user->id)->orderBy("price", "asc")->first();
                if (isset($indPriceObj)) {
                    $indPrice = $indPriceObj->price;
                }
            }
        }
        
        // use individual price?
        if (isset($indPrice)) {
            if ($price > $indPrice) { $price = $indPrice; }
        }
        
        // use sale On Category Price?
        if (isset($saleOnCategoryPrice)) {
            if ($price > $saleOnCategoryPrice) { $price = $saleOnCategoryPrice; }
        }

        
        // coupon sale
        if ($coupon!= null) {
            if ($coupon->isValidForCurrentProduct($this)) {
                $price = $price - $coupon->getFinalDiscount($price);
            }
        }
        
        
        // min 0
        if ($price < 0) {
            $price = 0;
        }
        
        // current dicsount
        $outCurrentDiscount = $standardPrice - $price; 
        
        return $price;
    }
    

    /**
     * Helper function: by the property options return active product propertry options with pivot data
     * - helper for price diferences, etc..
     * 
     * @param type $inPropertyOptions - array from post
     * @return array
     */
    public function getProductPropertyOptions($inPropertyOptions) {
        
        $productPropertyOptions = [];
        
        if (!$inPropertyOptions) { return $productPropertyOptions; }
        if (is_array($inPropertyOptions) == false) { return $productPropertyOptions; }
        
        foreach ($inPropertyOptions as $property_id => $option_title) {
            $property = \Jiri\JKShop\Models\Property::find($property_id);
            // only select box + select multi
            if (($property->type != 1) && ($property->type != 2)) { continue; }
            
            // prepair options (select have one, multi select have many)
            $options = [];
            if (is_array($option_title)) {
                foreach ($option_title as $option_title_item) {
                    $options[] = \Jiri\JKShop\Models\PropertyOption::where("property_id", $property_id)->where("title",$option_title_item)->first();    
                }
            }
            else {
                $options[] = \Jiri\JKShop\Models\PropertyOption::where("property_id", $property_id)->where("title",$option_title)->first();
            }
            
            // get option / options
            foreach ($options as $option) {

                // get product option with pivot data
                $productOption = $this->propertyOptions()->find($option->id);
                if ($productOption) {
                    $productPropertyOptions[] = $productOption;
                }
            }
        }
        
        
        return $productPropertyOptions;
    }
    

    /**
     * Get final price formated by settings
     * 
     * @param type $inPropertyOptions - property options - use for price differences
     * @return type
     */
    public function getFinalPriceFormated($inPropertyOptions = []) {
        $jkshopSetting = \Jiri\JKShop\Models\Settings::instance();
        $price = $this->getFinalPrice($inPropertyOptions);
        
        $fPrice = $jkshopSetting->getPriceFormatted($price);
        return $fPrice;
    }
    
    /**
     * Check if is product allow to order
     * 
     * @return boolean
     */
    public function isAllowOrder() {
        $qtyAllow = false;
        
        // check qty
        if ($this->quantity >= $this->minimum_quantity) {
            $qtyAllow = true;
        }
        else {
            if ($this->when_out_of_stock == 1) {
                $qtyAllow = true;
            }
        }
        
        // check all
        if (($qtyAllow) & ($this->active) & ($this->available_for_order)) {
            return true;
        }
        
        return false;
    }
    
    /**
     * Get label for dropdown condition
     * 
     * @return string
     */
    public function getConditionLabel() {
        switch ($this->condition) {
            case 0:
                // New is default - not show
                //return Lang::get("jiri.jkshop::lang.products.condition_0");
                return "";
            case 1:
                return Lang::get("jiri.jkshop::lang.products.condition_1");
            case 2:
                return Lang::get("jiri.jkshop::lang.products.condition_2");
            default:
                return "";
        }
    }
    
    
    /**
     * Check stock, update stock and return real qty for order
     * 
     * @param type $qty
     * @param type $updateRealStock = false
     * @return type
     */
    public function orderProduct($qty, $updateRealStock = false) {
        
        $stockQuantity = $this->quantity;
        
        if ($stockQuantity >= $qty) {
            // stock is ok
            $stockQuantity -= $qty;
        }
        else {
            // stock is lower
            if ($this->when_out_of_stock == 1) {
                // allow order with 0 stock
                $stockQuantity = 0;
                $this->save();
                return $qty;
            }
            elseif ($stockQuantity > 0) {
                // allow max when i have
                $qty = ((int)($stockQuantity / $this->minimum_quantity)) * $this->minimum_quantity;
                $stockQuantity = $stockQuantity - $qty;
            }
            else {
                $qty = 0;
            }
        }
        
        if ($updateRealStock) {
            $this->quantity = $stockQuantity;
            $this->save();
        }
        
        return $qty;
    }
    
    /**
     * Return Product Back
     * 
     * @param type $qty
     * @param type $updateRealStock
     */
    public function returnProductBack($qty, $updateRealStock = false) {
        $this->quantity += $qty;
        
        if ($updateRealStock) {
            $this->save();
        }
        
        return $this->quantity;
    }
    
    /**
     * Get full properties (general + advanced)
     * 
     * @return array
     */
    public function getFullProperties() {
        $properties = $this->properties;
        
        foreach ($this->propertyOptions as $propertyOption) {
            // check advanced properties
            if ($this->properties->contains($propertyOption->property) == false) {
                // add property with one option
                $properties[$propertyOption->property->id] = $propertyOption->property;
            }
        }
        
        return $properties;
    }

    /**
     * Get main image
     * 
     * @return type
     */
    public function getMainImage() {
        if (count($this->images) > 0 ) {
            return $this->images[0];
        }
        else {
            $jkshopSetting = \Jiri\JKShop\Models\Settings::instance();
            if ($jkshopSetting->productDefaultImage != null) {
                return $jkshopSetting->productDefaultImage;
            }
        }
        
        return null;
    }
    
    /**
     * Get main image path
     * 
     * @return string
     */
    public function getMainImagePath() {
        $mainImage = $this->getMainImage();
        if ($mainImage != null) {
            return $mainImage->path;
        }
        else {
            return "";
        }
    }
}