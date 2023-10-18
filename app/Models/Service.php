<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'price',
        'terms'
    ];

    protected $table = 'services';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_service', 'service_id', 'product_id');
    }
}
