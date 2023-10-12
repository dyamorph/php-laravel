<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FetchExchangeRates;

class UpdateExchangeRates extends Command
{
    protected $signature = 'app:fetch-exchange-rates';

    protected $description = 'Update exchange rates';

    public function handle(): void
    {
        (new FetchExchangeRates)->fetchRates();
    }
}
