<?php

namespace App\Services;

use App\Models\ExchangeRate;
use Illuminate\Database\Eloquent\Collection;


class ExchangeRateService
{
    public function __construct(public ExchangeRate $exchangeRate)
    {
    }

    public function create(array $data): ExchangeRate
    {
        if (isset($data['status']))
        {
            $data['status'] = $data['status'] ? 1 : 0;
        }

        if (isset($data['system_check']))
        {
            $data['system_check'] = 1;
        }
        else
        {
            $data['system_check'] = 0;
        }

        $exchangeRate = ExchangeRate::findOrFail($data['id']);
        $data['name'] = $exchangeRate->name;
        $data['currency_code'] = $exchangeRate->currency_code;
        $data['from'] = 'rsa';

        $data['from_id'] =\Auth::guard('rsa')->id();
        return ExchangeRate::create($data);
    }

    public function getById(int $id): ExchangeRate
    {
        return $this->exchangeRate::query()
            ->where('id', $id)
            ->firstOrFail();
    }

    public function getByCurrencyCode(string $currencyCode)
    {
        return $this->exchangeRate::query()
            ->where('currency_code', $currencyCode)
            ->orderBy('id','DESC')
            ->get();
    }

    public function update(array $data): bool
    {
        if (isset($data['status']))
        {
            $data['status'] = true;
        }
        else
        {
            $data['status'] = false;
        }
        if (isset($data['system_check']))
        {
            $data['system_check'] = $data['system_check'] ? 1 : 0;
        }
        $data['selling_rate'] = (float)$data['selling_rate'];
        $data['buying_rate'] = (float)$data['buying_rate'];

        return $this->exchangeRate->update($data);
    }

    public function setExchange(ExchangeRate $exchangeRate): ExchangeRateService
    {
        $this->exchangeRate = $exchangeRate;
        return $this;
    }

    public function updateStatus(int $status)
    {

        $this->exchangeRate->status = !$this->exchangeRate->status;
        return $this->exchangeRate->save();
    }
    public function getAllExchangeRates(): Collection
    {
        return $this->exchangeRate::all();
    }

    public function getAllUniqueExchangeRates(): Collection
    {
        return $this->exchangeRate::query()
            ->whereIn('id', function ($query) {
                $query->selectRaw('MAX(id)')
                    ->from('exchange_rates')
                    ->groupBy('currency_code');
            })
            ->orderBy('id','DESC')
            ->get();

    }


}
