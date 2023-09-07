<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Data\ProductData;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(): Collection
    {
        return Product::all();
    }

    public function store(ProductData $data): Product
    {
        return Product::create($data->all());
    }

    public function update(Product $product, ProductData $data): Product
    {
        $product->update($data->all());

        return $product;
    }

    public function destroy(Product $product): bool
    {
        $product->delete();

        return true;
    }
}
