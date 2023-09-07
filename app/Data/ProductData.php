<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ProductData extends Data
{
    public function __construct(
        public string $title,
        public string $description,
        public string $manufacturer,
        public string $release_date,
        public int $price,
    ) {}
}
