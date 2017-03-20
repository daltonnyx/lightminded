<?php namespace Jiri\JKShop\Models;

use Model;

class Settings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel'
        ];
    
    /**
     * TranslatableModel
     *
     * @var type 
     */
    public $translatable = [
        'invoice_template_content', 
    ];    

    // A unique code
    public $settingsCode = 'jiri_jkshop_settings';

    // Reference to field configuration
    public $settingsFields = 'fields.yaml';
    
    public $belongsTo = [
        'cash_on_delivery_order_status_before' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ], 
        'cash_on_delivery_order_status_after' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ],
        'bank_transfer_order_status_before' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ], 
        'bank_transfer_order_status_after' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ], 
        'paypal_order_status_before' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ], 
        'paypal_order_status_after' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ],         
        'stripe_order_status_before' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ], 
        'stripe_order_status_after' => [
            'Jiri\JKShop\Models\OrderStatus', 
        ],         
    ];
    
    public $attachOne = [
        'productDefaultImage' => 'System\Models\File',
    ];    

    /**
     * Get general price formated
     * 
     * @param type $price
     * @return type
     */
    public function getPriceFormatted($price) {
        $fPrice = number_format($price, $this->number_format_decimals, $this->number_format_dec_point, $this->number_format_thousands_sep);
        if ($this->currency_char_position == 1) {
            return $this->currency_char.$fPrice;
        }
        else {
            return $fPrice.$this->currency_char;
        } 
    }
    
}