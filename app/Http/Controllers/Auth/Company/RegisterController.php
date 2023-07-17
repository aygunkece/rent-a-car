<?php

namespace App\Http\Controllers\Auth\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRegisterRequest;
use App\Services\CompanyService;
use App\Traits\SweetAlert;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    use SweetAlert;

    public function __construct(public CompanyService $companyService)
    {

    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('front.company-pre-register');
    }

    /**
     * @param CompanyRegisterRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyRegisterRequest $request): RedirectResponse
    {

        $data = $request->except("_token");

        try
        {
            $createdCompany = $this->companyService->create($data);
        }
        catch (\Exception $exception)
        {
            dd($exception->getMessage());
        }


        $this->rsAlert("success", "Başarılı", $createdCompany->name . " Kayıt Formunuz Gönderildi.");

        return redirect()->back();
    }


}
