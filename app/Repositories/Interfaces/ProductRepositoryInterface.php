<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Data\ProductData;
use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all();
    public function store(ProductData $data);
    public function update(Product $product , ProductData $data);
    public function destroy(Product $product);
}
