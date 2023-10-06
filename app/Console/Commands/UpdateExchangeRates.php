<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FetchExchangeRates;

class UpdateExchangeRates extends Command
{
    protected $signature = 'app:fetch-exchange-rates';

    protected $description = 'Command description';

    public function handle(): void
    {
        FetchExchangeRates::fetchRates();
    }
}
