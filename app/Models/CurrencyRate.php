<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyRate extends Model
{
    protected $fillable = [
        'currency',
        'rate',
        'code',
    ];

    protected $table = 'currency_rates';
}
