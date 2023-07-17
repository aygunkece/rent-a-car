<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use SimpleXMLElement;

class ExchangeRatesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exchange:rates {--option=0}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $option = (bool)$this->option('option');
        $url = 'https://www.tcmb.gov.tr/kurlar/today.xml';

        $response = \Http::get($url);
        if ($response)
        {
            $xml = simplexml_load_string($response->body());

            foreach ($xml->Currency as $currency)
            {
                $name = $currency->CurrencyName;
                $code = $currency->attributes()->CurrencyCode;
                $buyingRate = $currency->ForexBuying;
                $sellingRate = (float)$currency->ForexSelling;
                if (empty($sellingRate) && !empty($buyingRate))
                {
                    $sellingRate= $buyingRate;

                }
                else if (empty($sellingRate) && empty($buyingRate))
                {
                     \Log::error("Selling rate alınamadı");
                    $this->error('Selling rate alınamadı');

                    break;
                }
                $existingRecord = DB::table('exchange_rates')->where('currency_code', $code)->orderBy("id", "DESC")->first();

                if (is_null($existingRecord))
                {
                    DB::table('exchange_rates')->where('currency_code', $code)->insert([
                        'name' => $name,
                        'currency_code' => $code,
                        'buying_rate' => $buyingRate,
                        'selling_rate' => $sellingRate,
                        'created_at' => now(),
                        'updated_at' => now(),
                        'from' => 'system',
                        'status' => 0,
                        'system_check' => 1
                    ]);
                }
                else
                {
                    $percentleSellingRate = ($existingRecord->selling_rate/100)*10;
                    $upLimit = $existingRecord->selling_rate + $percentleSellingRate;
                    $downLimit = $existingRecord->selling_rate - $percentleSellingRate;

                    if ($existingRecord->system_check != 0)
                    {
                        if ($option || (($sellingRate > $upLimit || $sellingRate < $downLimit) && $sellingRate != $existingRecord->selling_rate))
                        {


                            DB::table('exchange_rates')->insert([
                                'name' => $name,
                                'currency_code' => $code,
                                'buying_rate' => $buyingRate,
                                'selling_rate' => $sellingRate,
                                'created_at' => now(),
                                'updated_at' => now(),
                                'from' => 'system',
                                'status' => $existingRecord->status,
                                'system_check' => $existingRecord->system_check

                            ]);
                        }

                    }
                }

            }
            $this->info('Kur Güncellemeleri başarıyla tamamlandı.');
            \Log::info("30 dakikalık Kur Güncellemeleri başarıyla tamamlandı.");
        }
        else
        {
            $this->error('Kur güncellemeleri alınamadı.');
            \Log::info("Kur güncellemeleri alınamadı.");
        }
    }
}
