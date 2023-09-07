<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function __construct(
        protected readonly ProductRepositoryInterface $productRepository
    ) {}

    public function index(): View
    {
        $products = $this->productRepository->all();

        return view('client.index', compact('products'));
    }

    public function show(Product $product): View
    {
        $services = Service::all();

        return view('client.show', compact('product', 'services'));
    }
}
