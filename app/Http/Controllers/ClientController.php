<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use App\Repositories\Interfaces\ProductRepositoryInterface as ProductRepository;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function __construct(
        protected readonly ProductRepository $productRepository
    ) {}

    public function index(): View
    {
        return view('client.index', ['products' => $this->productRepository->all()]);
    }

    public function show(Product $product): View
    {
        return view('client.show', ['product' => $product, 'services' => Service::all()]);
    }
}
