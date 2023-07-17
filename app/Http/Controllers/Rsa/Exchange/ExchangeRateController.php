<?php

namespace App\Http\Controllers\Rsa\Exchange;

use App\Http\Controllers\Controller;
use App\Http\Requests\Exchange\ExchangeRequest;
use App\Models\ExchangeRate;
use App\Services\ExchangeRateService;
use App\Traits\SweetAlert;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ExchangeRateController extends Controller
{
    use SweetAlert;
    public function __construct(public ExchangeRateService $exchangeRateService)
    {
    }

    public function show()
    {
       $rate = $this->exchangeRateService->getAllUniqueExchangeRates();
        return view('rsa.exchange.exchange-rates-list',['rate' => $rate]);

    }

    public function store(Request $request)
    {
        $data = $request->only(['name','currency_code','buying_rate','selling_rate','status','system_check']);
        $this->exchangeRateService->create($data);


        $this->rsAlert("success","Başarılı","Kur kaydı başarıyla yapılmıştır.");
        return redirect()->route('exchange.exchangeRates.list');
    }

    public function create()
    {
        return view('rsa.exchange.create-update');
    }

    public function changeStatus(Request $request)
    {
        $exchange = $this->exchangeRateService->getById($request->exchangeID);
        $this->exchangeRateService->setExchange($exchange)->updateStatus($exchange->status);
        $resultStatus = $this->exchangeRateService->getById($request->exchangeID)->status;

        return response()->json(['status' => 'success', 'message' => 'Başarılı', 'exchange_status' => $resultStatus])->setStatusCode(200);
    }

    public function edit(Request $request)
    {
       $exchange = $this->exchangeRateService->getById($request->id);
       return view('rsa.exchange.create-update', ['exchange' => $exchange]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['buying_rate','selling_rate','status','system_check']);
        $data['id'] = $id;
        $exchange = $this->exchangeRateService->getById($request->id);

        $this->exchangeRateService->setExchange($exchange)->create($data);

        return redirect()->route('exchange.exchangeRates.list');

    }

    public function showHistory(Request $request)
    {

        $history = $this->exchangeRateService->getByCurrencyCode($request->currency_code);

        return view('rsa.exchange.currency-list',['history' => $history]);
    }
}
