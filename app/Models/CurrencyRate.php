<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
