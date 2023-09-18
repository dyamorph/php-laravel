<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Data\ProductData;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function all(): LengthAwarePaginator;

    public function store(ProductData $data): Product;

    public function update(Product $product , ProductData $data): Product;

    public function destroy(Product $product): bool;
}
