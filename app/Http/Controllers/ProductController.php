<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store()
    {
        $product = request()->validate([
            'title' => '',
            'description' => '',
            'manufacturer' => '',
            'release_date' => '',
            'price' => '',
        ]);

        $this->productRepository->store($product);

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        $product = $this->productRepository->find($product->id);

        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product = $this->productRepository->find($product->id);

        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product)
    {
        $data = request()->validate([
            'title' => '',
            'description' => '',
            'manufacturer' => '',
            'release_date' => '',
            'price' => '',
        ]);

        $this->productRepository->update($data, $product->id);

        return redirect()->route('product.show', $product->id);
    }

    public function destroy(Product $product)
    {
        $this->productRepository->destroy($product->id);

        return redirect()->route('product.index');
    }
}
