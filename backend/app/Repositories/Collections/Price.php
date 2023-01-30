<?php

namespace App\Repositories\Collections;

use App\Repositories\Models\Currency;
use App\Repositories\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Price extends Model
{
    use HybridRelations, SoftDeletes;

    /**
     * @var string
     */
    protected $connection = 'mongodb';

    protected $fillable = [
        'original_value',
        'discounts',
        'converted_value',
        'conversion_api_return',
        'conversion_price',
        'id_currency_base',
        'id_currency_to',
        'id_user',
        'id_payment_method'
    ];

    /**
     * @return HasOne
     */
    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'id_payment_method');
    }

    /**
     * @return HasOne
     */
    public function currencyBase()
    {
        return $this->hasOne(Currency::class, 'id', 'id_currency_base');
    }

    /**
     * @return HasOne
     */
    public function currencyTo()
    {
        return $this->hasOne(Currency::class, 'id', 'id_currency_to');
    }
}
