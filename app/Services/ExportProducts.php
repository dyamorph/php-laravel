<?php

declare(strict_types=1);

namespace App\Services;

use App\Jobs\ExportProductsToRabbitMQ;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class ExportProducts
{
    public function __construct(
        protected readonly ProductRepositoryInterface $productRepository
    ) {}

    public function exportProducts(): RedirectResponse
    {
        $products = $this->productRepository->all();

        $csvFileName = 'products_data.csv';
        $csvFilePath = storage_path('/' . $csvFileName);
        $csvFile = fopen($csvFilePath, 'w');

        fputcsv($csvFile, ["Id", "Title", "Description", "Manufacturer", "Release date", "Price", "Currency"]);

        foreach ($products as $product) {
            fputcsv($csvFile, [
                $product->id,
                $product->title,
                $product->description,
                $product->manufacturer,
                $product->release_date,
                $product->price,
                $product->currency->name
            ]);
        }

        fclose($csvFile);

        ExportProductsToRabbitMQ::dispatch($csvFilePath);

        return redirect()->route('products.index')->with('message', 'Export successfully!');
    }
}
