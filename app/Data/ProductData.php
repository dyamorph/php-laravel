<?php

declare(strict_types=1);

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        #[Required, StringType, Max(40), Min(5)]
        public string $title,

        #[Required, StringType, Max(1000), Min(10)]
        public string $description,

        #[Required, StringType, Max(40), Min(2)]
        public string $manufacturer,

        #[Required, WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        public Carbon $release_date,

        #[Required, IntegerType]
        public int $price,
    ) {}
}
