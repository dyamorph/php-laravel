<?php

declare(strict_types=1);

namespace App\Services;

use Aws\Ses\SesClient;

class SendEmail
{
    public function sendEmail(): void
    {
        $sender = 'localstack@gmail.com';
        $recipient = 'admin@gmail.com';
        $subject = 'Export products';
        $body = 'Products catalog export successfully!';

        $sesClient = new SesClient([
            'version' => 'latest',
            'region' => $_ENV['AWS_DEFAULT_REGION'],
            'endpoint' => $_ENV['AWS_ENDPOINT'],
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => $_ENV['AWS_ACCESS_KEY_ID'],
                'secret' => $_ENV['AWS_SECRET_ACCESS_KEY'],
            ],
        ]);

        $sesClient->verifyEmailAddress(['EmailAddress' => 'localstack@gmail.com']);

        $sesClient->sendEmail([
            'Source' => $sender,
            'Destination' => [
                'ToAddresses' => [$recipient],
            ],
            'Message' => [
                'Subject' => [
                    'Data' => $subject,
                ],
                'Body' => [
                    'Text' => [
                        'Data' => $body,
                    ],
                ],
            ],
        ]);
    }
}
