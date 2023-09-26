<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Services\ExportProducts;
use Illuminate\Http\RedirectResponse;

class ExportController extends Controller
{
    public function __invoke(ExportProducts $exportProducts): ?RedirectResponse
    {
        return $exportProducts->exportProducts();
    }
}
