<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable = [
        'title',
        'price',
        'terms'
    ];

    protected $table = 'services';

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_service', 'service_id', 'product_id');
    }
}
