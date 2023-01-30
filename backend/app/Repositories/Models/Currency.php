<?php

namespace App\Repositories\Models;
use Database\Factories\CurrencyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Currency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'show'
    ];

    /**
     * @return CurrencyFactory
     */
    public static function newFactory(): CurrencyFactory
    {
        return CurrencyFactory::new();
    }
}
