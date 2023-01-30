<?php

namespace App\Repositories\Models;

use Database\Factories\PaymentMethodFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'rate'
    ];

    /**
     * @return PaymentMethodFactory
     */
    public static function newFactory(): PaymentMethodFactory
    {
        return PaymentMethodFactory::new();
    }
}
