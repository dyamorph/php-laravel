<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ClientController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();

        return view('client.index', compact('products'));
    }

    public function show(Product $product)
    {
        $services = Service::all();

        return view('client.show', compact('product', 'services'));
    }
}
