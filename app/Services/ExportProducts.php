<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Aws\S3\S3Client;
use Illuminate\Http\RedirectResponse;
use Throwable;

class ExportProducts
{
    public function exportProducts()
    {
        $productRepository = new ProductRepository();
        $products = $productRepository->all();

        $csvFileName = 'products_data.csv';
        $csvFilePath = storage_path('app/' . $csvFileName);
        $csvFile = fopen($csvFilePath, 'w');

        fputcsv($csvFile, ["Id", "Title", "Description", "Manufacturer", "Release date", "Price"]);

        foreach ($products as $product) {
            fputcsv($csvFile, [$product->id, $product->title, $product->description, $product->manufacturer, $product->release_date, $product->price]);
        }

        fclose($csvFile);

        $s3 = new S3Client([
            'version' => 'latest',
            'region' => $_ENV['AWS_DEFAULT_REGION'],
            'endpoint' => $_ENV['AWS_ENDPOINT'],
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => $_ENV['AWS_ACCESS_KEY_ID'],
                'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
            ],
        ]);

        $bucketName = $_ENV['AWS_BUCKET'];
        $s3->createBucket(['Bucket' => $bucketName]);

        try {
            $s3->putObject([
                'Bucket' => $_ENV['AWS_BUCKET'],
                'Key' => 'products',
                'SourceFile' => $csvFilePath,
            ]);

            $emailService = new SendEmail();
            $emailService->sendEmail();
            unlink($csvFilePath);

            return redirect()->route('products.index')->with('message', 'Export successfully!');
        } catch (Throwable $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
