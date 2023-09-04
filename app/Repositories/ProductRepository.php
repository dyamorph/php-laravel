<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    public function all()
    {
        return Product::all();
    }

    public function store($data)
    {
        return Product::create($data);
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function update($data, $id)
    {
        $product = Product::where('id', $id)->first();

        $product->title = $data['title'];
        $product->description = $data['description'];
        $product->manufacturer = $data['manufacturer'];
        $product->release_date = $data['release_date'];
        $product->price = $data['price'];

        $product->save();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}
