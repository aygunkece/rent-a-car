<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $fillable = [
        'name',
        'currency_code',
        'buying_rate',
        'selling_rate',
        'status',
        'system_check',
        'from',
        'from_id'
    ];

    protected $table = 'exchange_rates';
}
