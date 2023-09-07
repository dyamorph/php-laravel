<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ServiceData extends Data
{
    public function __construct(
        public string $title,
        public int $terms,
        public int $price,
    ) {}
}
