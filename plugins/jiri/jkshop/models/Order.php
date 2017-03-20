<?php namespace Jiri\JKShop\Models;

use Model;
use DB;
use Mail;
use App;
use Lang;

/**
 * Order Model
 */
class Order extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'jiri_jkshop_orders';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        "orderstatus",
        "note",
        "tracking_number",
        
        // User - Rainlab User if exist
        "user",
        
        // Delivery address
        "ds_first_name",
        "ds_last_name",
        "ds_address",
        "ds_address_2",
        "ds_postcode",
        "ds_city",
        "ds_county",
        "ds_country",
        
        // Invoice address
        "is_first_name",
        "is_last_name",
        "is_address",
        "is_address_2",
        "is_postcode",
        "is_city",
        "is_county",
        "is_country",
        
        // Contact
        "contact_email",
        "contact_phone",

        // Carrier
        "carrier",

        // Price
        "total_price_without_tax",
        "total_tax",
        "total_price",
        
        "coupon",
        "total_global_discount",
        
        "shipping_price_without_tax",
        "shipping_tax",
        "shipping_price",

        // Payment methods                            
        "payment_method",  // obsolete
    ];
            
    protected $jsonable = [
        // Products
        // propably save ID + qty + price, all other can be from producst DB
        'products_json', 
        'paid_detail'
        ];
    
    protected $dates = ['paid_date'];
    
    
    
    
    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
        'orderstatus' => [
            'Jiri\JKShop\Models\OrderStatus', 
            'key' => 'orderstatus_id'
        ],         
        'carrier' => [
            'Jiri\JKShop\Models\Carrier', 
            'key' => 'carrier_id'
        ],        
        'coupon' => [
            'Jiri\JKShop\Models\Coupon', 
            'key' => 'coupon_id'
        ],        
        'paymentGateway' => [
            'Jiri\JKShop\Models\PaymentGateway', 
            'key' => 'payment_gateway_id'
        ],         
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'invoice' => 'System\Models\File',
    ];
    public $attachMany = [];
    
    
    public function getProductOptions()
    {
        return Product::get()->lists("title","id");
    }
    
    public function getUserOptions()
    {
        if (class_exists("\RainLab\User\Models\User")) {
            $usersList = \RainLab\User\Models\User::select(
                    DB::raw("CONCAT_WS(' ', id, '|', name, surname) AS full_name, id")
                    )->lists('full_name', 'id');
            return [null => Lang::get("jiri.jkshop::lang.plugin.please_select")] + $usersList;
        }
        else {
            return [
                null => "Firstly install Rainlab User plugin"
            ];
        }
    }  

    /**
     * OBSOLETE 12.11.2016 
     * 
     * PaymentMethodOptions
     * 
     * @param type $activeOnly
     * @return type
     */
    public function getPaymentMethodOptions($activeOnly = false) {
        
        $options = [
            1 => Lang::get("jiri.jkshop::lang.settings.cash_on_delivery"),
            2 => Lang::get("jiri.jkshop::lang.settings.bank_transfer"),
            3 => Lang::get("jiri.jkshop::lang.settings.paypal"),
            4 => Lang::get("jiri.jkshop::lang.settings.stripe"),
        ];
        
        
//        if ($activeOnly) {
//            $jkshopSetting = \Jiri\JKShop\Models\Settings::instance();
//            if (!$jkshopSetting->cash_on_delivery_active) { unset($options[1]); }
//            if (!$jkshopSetting->bank_transfer_active) { unset($options[2]); }
//            if (!$jkshopSetting->paypal_active) { unset($options[3]); }
//            if (!$jkshopSetting->stripe_active) { unset($options[4]); }
//        }
        
        return $options;
    }
    
    
    /**
     * Get Payment Method Label
     * 
     * @return string
     */
    public function getPaymentMethodLabel() {
//        $arr = $this->getPaymentMethodOptions();
//        
//        if (array_key_exists($this->payment_method, $arr)) {
//            return $arr[$this->payment_method];
//        }
//        else {
//            return "";
//        }
        
        // 12.11.2016 new version
        if ($this->paymentGateway) {
            return $this->paymentGateway->gateway_title;
        }
        else {
            return "";
        }
    }
    
    
    /**
     * Sets the "url" attribute with a URL to this object
     * @param string $pageName
     * @param Cms\Classes\Controller $controller
     */
    public function setUrl($pageName, $controller)
    {
        $params = [
            'id' => $this->id,
        ];

        return $this->url = $controller->pageUrl($pageName, $params);
    }  
    


    /*
     * After fetch data from DB
     * 
     */
    public $extend_products_json = array();
    public function afterFetch() {
        // add product relation by products_json into extend_products_json
        $this->extend_products_json = array();
        foreach ($this->products_json as $key => $producJson) {
            $producJson["product"] = \Jiri\JKShop\Models\Product::find($producJson["product_id"]);
            $this->extend_products_json += [$key => $producJson];
        }
    }
    
    /**
     * Complete create order from basket
     * - fill all
     * - create invoice
     * - 
     * 
     */
    public function createFromBasket($basket) {
        $jkshopSetting = \Jiri\JKShop\Models\Settings::instance();
        
        // User - Rainlab User if exist
        if (class_exists("\RainLab\User\Models\User")) {
            $user = \RainLab\User\Facades\Auth::getUser();
            if (isset($user)) {
                $this->user_id = \RainLab\User\Facades\Auth::getUser()->id;
            }
        }
        
        // Delivery address
        $this->ds_first_name = $basket["ds_first_name"];
        $this->ds_last_name = $basket["ds_last_name"];
        $this->ds_address = $basket["ds_address"];
        $this->ds_address_2 = $basket["ds_address_2"];
        $this->ds_postcode = $basket["ds_postcode"];
        $this->ds_city = $basket["ds_city"];
        $this->ds_county = $basket["ds_county"];
        $this->ds_country = $basket["ds_country"];

        // Invoice address
        $this->is_first_name = $basket["is_first_name"];
        $this->is_last_name = $basket["is_last_name"];
        $this->is_address = $basket["is_address"];
        $this->is_address_2 = $basket["is_address_2"];
        $this->is_postcode = $basket["is_postcode"];
        $this->is_city = $basket["is_city"];
        $this->is_county = $basket["is_county"];
        $this->is_country = $basket["is_country"];
        
        // Carrier
        $this->carrier = Carrier::find($basket["shipping_id"]);
        
        // Price
        $this->total_price_without_tax = $basket["total_price_without_tax"];
        $this->total_tax = $basket["total_tax"];
        $this->total_price = $basket["total_price"];
        $this->total_global_discount = $basket["total_global_discount"];
        
        $this->shipping_price_without_tax = $basket["shipping_price_without_tax"];
        $this->shipping_tax = $basket["shipping_tax"];
        $this->shipping_price = $basket["shipping_price"];
        
        // coupon
        if ($basket["coupon_model"] != null) {
            $this->coupon = $basket["coupon_model"];
            $wCoupon = Coupon::find($this->coupon->id);
            $wCoupon->used_count++;
            $wCoupon->save();
        }
        
        
        // Contact
        $this->contact_email = $basket["contact_email"];
        $this->contact_phone = $basket["contact_phone"];
        $this->note = $basket["note"];

        // Payment method + OrderStatus
        //$this->payment_method = $basket["payment_method_id"]; // obsolete
        $paymentGateway = PaymentGateway::find($basket["payment_method_id"]);
        $this->paymentGateway = $paymentGateway;
        if (($paymentGateway) && ($paymentGateway->orderStatusBefore)) {
            $this->orderstatus = $paymentGateway->orderStatusBefore;
        }
        
        // Products
        $products_json = [];
        foreach ($basket["products"] as $id => $productJson) {
            
            $qty = $productJson["basket_quantity"];
            $product = Product::find($productJson["product_id"]);
            
            if ($jkshopSetting->extended_inventory_management) {
                // extended_inventory_management - after change order status
            }
            else {
                // check and remove qty form stock
                $qty = $product->orderProduct($qty, true);
                // i call this immediately get basket and this method check stock availability
            }
            
            // $basket["products"][$id]["product"]
            $products_json[] = [
                "product_id" => $productJson["product_id"],
                "quantity" => $qty,
                "total_price_without_tax" => $productJson["total_price_without_tax"],
                "total_tax" => $productJson["total_tax"],
                "total_price" => $productJson["total_price"],
                "options_data" => $productJson["options_data"],
                "options_text" => $productJson["options_text"],
            ];
        }
        $this->products_json = $products_json;

        // ---------------------------------------------------------------------
        // Try to update rainlab user if exist
        // ---------------------------------------------------------------------
        try {
            // User - Rainlab User if exist
            if (class_exists("\RainLab\User\Models\User")) {
                $user = \RainLab\User\Facades\Auth::getUser();
                if (isset($user)) {
                    // Delivery address
                    $user->jkshop_ds_first_name = $basket["ds_first_name"];
                    $user->jkshop_ds_last_name = $basket["ds_last_name"];
                    $user->jkshop_ds_address = $basket["ds_address"];
                    $user->jkshop_ds_address_2 = $basket["ds_address_2"];
                    $user->jkshop_ds_postcode = $basket["ds_postcode"];
                    $user->jkshop_ds_city = $basket["ds_city"];
                    $user->jkshop_ds_county = $basket["ds_county"];
                    $user->jkshop_ds_country = $basket["ds_country"];

                    // Invoice address
                    $user->jkshop_is_first_name = $basket["is_first_name"];
                    $user->jkshop_is_last_name = $basket["is_last_name"];
                    $user->jkshop_is_address = $basket["is_address"];
                    $user->jkshop_is_address_2 = $basket["is_address_2"];
                    $user->jkshop_is_postcode = $basket["is_postcode"];
                    $user->jkshop_is_city = $basket["is_city"];
                    $user->jkshop_is_county = $basket["is_county"];
                    $user->jkshop_is_country = $basket["is_country"];

                    // Contact
                    $user->jkshop_contact_email = $basket["contact_email"];
                    $user->jkshop_contact_phone = $basket["contact_phone"];

                    $user->forceSave();
                }
            }
        } catch (Exception $ex) {
            // do nothing - update user is not important
            return;
        }
        // ---------------------------------------------------------------------

        
    }
    
    /**
     * Event: after create
     * 
     */
    public function afterCreate() {
        $this->onOrderStatusChange($this->orderstatus, null);
        
        // Create invoice html
        $jkshopSetting = \Jiri\JKShop\Models\Settings::instance();
        $html = "<html><head><style>".$jkshopSetting->invoice_template_style."</style></head><body>".$jkshopSetting->invoice_template_content."</body></html>";
        
        $html =  str_replace("{{order_id}}", $this->id, $html);
        
        $html =  str_replace("{{first_name}}", $this->is_first_name, $html);
        $html =  str_replace("{{last_name}}", $this->is_last_name, $html);
        $html =  str_replace("{{address}}", $this->is_address, $html);
        $html =  str_replace("{{address2}}", $this->is_address_2, $html);
        $html =  str_replace("{{postcode}}", $this->is_postcode, $html);
        $html =  str_replace("{{city}}", $this->is_city, $html);
        $html =  str_replace("{{county}}", $this->is_county, $html);
        $html =  str_replace("{{country}}", $this->is_country, $html);
        
        $html =  str_replace("{{ds_first_name}}", $this->ds_first_name, $html);
        $html =  str_replace("{{ds_last_name}}", $this->ds_last_name, $html);
        $html =  str_replace("{{ds_address}}", $this->ds_address, $html);
        $html =  str_replace("{{ds_address2}}", $this->ds_address_2, $html);
        $html =  str_replace("{{ds_postcode}}", $this->ds_postcode, $html);
        $html =  str_replace("{{ds_city}}", $this->ds_city, $html);
        $html =  str_replace("{{ds_county}}", $this->ds_county, $html);
        $html =  str_replace("{{ds_country}}", $this->ds_country, $html);
        
        $html =  str_replace("{{email}}", $this->contact_email, $html);
        $html =  str_replace("{{phone}}", $this->contact_phone, $html);
        
        
        if ($this->coupon != null) {
            $html =  str_replace("{{coupon_code}}", $this->coupon->code, $html);
            $html =  str_replace("{{coupon_value}}", $this->coupon->getValueLabel(), $html);
        }
        else {
            $html =  str_replace("{{coupon_code}}", "", $html);
            $html =  str_replace("{{coupon_value}}", "", $html);
        }

        
        $html =  str_replace("{{total_global_discount}}", $jkshopSetting->getPriceFormatted($this->total_global_discount), $html);
        $html =  str_replace("{{total_price_without_tax}}", $jkshopSetting->getPriceFormatted($this->total_price_without_tax + $this->shipping_price_without_tax), $html);
        $html =  str_replace("{{total_tax}}", $jkshopSetting->getPriceFormatted($this->total_tax + $this->shipping_tax ), $html);
        $html =  str_replace("{{total_price}}", $jkshopSetting->getPriceFormatted($this->total_price + $this->shipping_price), $html);

        $html =  str_replace("{{payment_method}}", $this->getPaymentMethodLabel(), $html);
        
        $html =  str_replace("{{date_now}}", \Carbon\Carbon::now()->toDateString(), $html);
        $html =  str_replace("{{date_now_14}}", \Carbon\Carbon::now()->addDay(14)->toDateString(), $html);
        $html =  str_replace("{{date_now_31}}", \Carbon\Carbon::now()->addDay(31)->toDateString(), $html);
        
        // products + shipping
        $htmlProducts = "";
        foreach ($this->products_json as $product_json) {
            $product = Product::find($product_json["product_id"]);
            $title = "";
            if ($product != null) {
                $title = $product->title;
            }
            
            $options_text = "";
            if (array_key_exists("options_text", $product_json)) {
                $options_text = $product_json["options_text"];
            }
            
            $htmlProducts .= "<div>";
            $htmlProducts .= "<span class='product-title'>".$title." <small class='product-title-options'>".$options_text."</small></span>";
            $htmlProducts .= "<span class='product-quantity'>".$product_json["quantity"]."</span>";
            $htmlProducts .= "<span class='product-price-without-tax'>".$jkshopSetting->getPriceFormatted($product_json["total_price_without_tax"])."</span>";
            $htmlProducts .= "<span class='product-tax'>".$jkshopSetting->getPriceFormatted($product_json["total_tax"])."</span>";
            $htmlProducts .= "<span class='product-price'>".$jkshopSetting->getPriceFormatted($product_json["total_price"])."</span>";
            $htmlProducts .= "</div>";
        }
        // shipping
        $htmlProducts .= "<div>";
        $htmlProducts .= "<span class='product-title'>Shipping</span>";
        $htmlProducts .= "<span class='product-quantity'>1</span>";
        $htmlProducts .= "<span class='product-price-without-tax'>".$jkshopSetting->getPriceFormatted($this->shipping_price_without_tax)."</span>";
        $htmlProducts .= "<span class='product-tax'>".$jkshopSetting->getPriceFormatted($this->shipping_tax)."</span>";
        $htmlProducts .= "<span class='product-price'>".$jkshopSetting->getPriceFormatted($this->shipping_price)."</span>";
        $htmlProducts .= "</div>";  
        
        $html =  str_replace("{{products}}", $htmlProducts, $html);
        
        
        // Generate invoice
        $invoiceTempFile = temp_path()."/invoice-".$this->id.".pdf";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $pdf->save($invoiceTempFile);
        
        // add into invoice
        $invoiceFile = new \System\Models\File();
        $invoiceFile->fromFile($invoiceTempFile);
        $this->invoice = $invoiceFile;
        $this->save();
        
        // clear temp
        unlink($invoiceTempFile);
    }
    
    /**
     * Event: before Update
     * 
     */
    public function beforeUpdate() {
        $oldModel = self::find($this->id);
        
        // check order status change
        if (isset($oldModel)) {
            if (($oldModel->orderstatus == null) && ($this->orderstatus != null)) {
                $this->onOrderStatusChange($this->orderstatus, null);
            }
            else if (($oldModel->orderstatus != null) && ($this->orderstatus != null)) {
                if ($oldModel->orderstatus->id != $this->orderstatus->id) {
                    $this->onOrderStatusChange($this->orderstatus, $oldModel->orderstatus);
                }
            }
        }
    }

    /**
     * After order status change - send email
     * 
     * @param type $newOrderStatus
     * @param type $prevOrderStatus
     */
    private function onOrderStatusChange($newOrderStatus, $prevOrderStatus) {
        
        $jkshopSetting = \Jiri\JKShop\Models\Settings::instance();
        
        if (isset($newOrderStatus)) {
            // prepair data
            $data = [];
            $data["first_name"] = $this->is_first_name;
            $data["last_name"] = $this->is_last_name;
            $data["order_id"] = $this->id;
            $tracking_url = ($this->carrier) ? $this->carrier->tracking_url : "";
            $tracking_url = str_replace("@", $this->tracking_number , $tracking_url);
            $data["tracking_url"] = ($this->tracking_number != null && $this->tracking_number != "") ? $tracking_url : "";
            
            // send email
            if ($newOrderStatus->mail_template != null) {
                Mail::send($newOrderStatus->mail_template->code, $data, function($message) use ($jkshopSetting, $newOrderStatus) {

                    $message->to($this->contact_email);
                    
                    if ($jkshopSetting->copy_all_order_emails_to != "") {
                        $message->bcc($jkshopSetting->copy_all_order_emails_to);
                    }
                    
                    // attach invoice?
                    if (($newOrderStatus->attach_invoice_pdf_to_email) && ($this->invoice != null)) {
                        $message->attach($this->invoice->getLocalPath(), ['as' => "invoice-".$this->id.".pdf"]);
                    }
                });                
            }

            // extended_inventory_management - after change order status
            if ($jkshopSetting->extended_inventory_management) {
                
                // qty decrease
                if ($newOrderStatus->qty_decrease) {
                    foreach ($this->products_json as $key => $producJson) {
                        $product = \Jiri\JKShop\Models\Product::find($producJson["product_id"]);
                        if ($product) {
                            $qty = $producJson["quantity"];
                            $product->orderProduct($qty, true);
                        }
                    }
                }
                
                // qty increase back
                if ($newOrderStatus->qty_increase_back) {
                    // !!! ONLY if have previous status with qty_decrease
                    if (($prevOrderStatus != null) && ($prevOrderStatus->qty_decrease)) {
                        foreach ($this->products_json as $key => $producJson) {
                            $product = \Jiri\JKShop\Models\Product::find($producJson["product_id"]);
                            if ($product) {
                                $qty = $producJson["quantity"];
                                $product->returnProductBack($qty, true);
                            }
                        }
                    }
                }
            }

        }
        
    }
    
    /**
     * Find order for payment gateway or return null
     * 
     * @param type $id
     */
    public static function findOrderBySlugForPaymentGateway($id) {
        $order = self::find($id);
        
        // check if order have user => user have to be logged in
        if ($order->user_id) {
            $user = \RainLab\User\Facades\Auth::getUser();
            
            // check anonymous access
            if ($user == null) {
                return null;
            }
            
            // check another user
            if ($order->user_id != $user->id) {
                return null;
            }
        }
        
        // check disallowed order statuses
        if ($order->orderstatus) {
            if ($order->orderstatus->disallow_for_gateway) {
                return null;
            }
        }
        
        return $order;
        
    }
    

}