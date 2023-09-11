<?php

declare(strict_types=1);

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class ServiceData extends Data
{
    public function __construct(
        #[Required, StringType, Max(40), Min(5)]
        public string $title,

        #[Required, IntegerType]
        public int $terms,

        #[Required, IntegerType]
        public int $price,
    ) {}
}
