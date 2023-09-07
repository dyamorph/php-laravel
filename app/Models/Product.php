<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Currencies;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'manufacturer',
        'release_date',
        'price',
        'currency'
    ];
    protected $table = 'products';
    protected $casts = [
        'release_date' => 'date:Y-m-d',
        'currency' => Currencies::class,
    ];
}
