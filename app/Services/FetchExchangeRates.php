<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Throwable;

class FetchExchangeRates
{
    public function fetchRates(): void
    {
        $response = Http::get('https://bankdabrabyt.by/export_courses.php');
        if ($response->successful()) {
            $xmlData = $response->body();
            $xmlObject = simplexml_load_string($xmlData);
            $values = $xmlObject->filials->filial[0]->rates->value;

            for ($i = 0; $i < 3 && isset($values[$i]); $i++) {
                $value = $values[$i];
                $iso = (string)$value['iso'];
                $code = (int)$value['code'];
                $buy = (float)$value['buy'];

                DB::table('currency_rates')->updateOrInsert(
                    ['currency' => $iso, 'code' => $code],
                    ['rate' => $buy]
                );
            }
        }
    }
}
