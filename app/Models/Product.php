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

    protected $dates = ['release_date'];

    protected $casts = [
        'currency' => Currencies::class,
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'product_service', 'product_id', 'service_id');
    }
}
