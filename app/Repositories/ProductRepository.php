<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Data\ProductData;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class ProductRepository implements ProductRepositoryInterface
{
    public function all(): LengthAwarePaginator
    {
        return QueryBuilder::for(Product::class)
            ->allowedFilters(['title', 'description', 'manufacturer', 'release_date', 'price'])
            ->allowedSorts('title', 'manufacturer', 'price')
            ->paginate(6);
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
