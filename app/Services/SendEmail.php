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
        $html_body = '<h1>Products catalog export successfully!</h1>';
        $subject = 'Products export';
        $plaintext_body = 'Products catalog export successfully!';
        $char_set = 'UTF-8';

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
            'Destination' => [
                'ToAddresses' => [$recipient],
            ],
            'ReplyToAddresses' => [$sender],
            'Source' => $sender,
            'Message' => [

                'Body' => [
                    'Html' => [
                        'Charset' => $char_set,
                        'Data' => $html_body,
                    ],
                    'Text' => [
                        'Charset' => $char_set,
                        'Data' => $plaintext_body,
                    ],
                ],
                'Subject' => [
                    'Charset' => $char_set,
                    'Data' => $subject,
                ],
            ],
        ]);
    }
}
