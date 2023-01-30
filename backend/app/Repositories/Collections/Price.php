<?php

namespace App\Repositories\Collections;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    protected $connection = 'mongodb';

    protected $fillable = [
        'original_value',
        'discounts',
        'total_value',
        'id_currency_base',
        'id_currency_to',
        'id_user',
        'id_payment_method'
    ];
}
