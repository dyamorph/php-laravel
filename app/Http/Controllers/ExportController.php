<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ExportProducts;
use Illuminate\Http\RedirectResponse;

class ExportController extends Controller
{
    public function __invoke(ExportProducts $exportProducts): ?RedirectResponse
    {
        return $exportProducts->exportProducts();
    }
}
