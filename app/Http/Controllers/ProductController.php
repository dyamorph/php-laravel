<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Data\ProductData;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        protected readonly ProductRepository $productRepository
    ) {}

    public function index(): View
    {
        dd($_ENV);
        return view('admin.products.index', ['products' => $this->productRepository->all()]);
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(ProductData $data): RedirectResponse
    {
        $this->productRepository->store($data);

        return redirect()->route('products.index');
    }

    public function show(Product $product): View
    {
        return view('admin.products.show', ['product' => $product]);
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Product $product, ProductData $data): RedirectResponse
    {
        $this->productRepository->update($product, $data);

        return redirect()->route('products.show', $product);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->productRepository->destroy($product);

        return redirect()->route('products.index');
    }
}
