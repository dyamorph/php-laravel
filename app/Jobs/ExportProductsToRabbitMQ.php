<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Services\SendEmail;
use Aws\S3\S3Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExportProductsToRabbitMQ implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $csvFilePath;

    public function __construct($csvFilePath)
    {
        $this->csvFilePath = $csvFilePath;
    }

    public function handle(): void
    {
        if ($this->csvFilePath) {
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

            $s3->putObject([
                'Bucket' => $_ENV['AWS_BUCKET'],
                'Key' => 'products',
                'SourceFile' => $this->csvFilePath,
            ]);

            (new SendEmail())->sendEmail();
        }
    }
}
