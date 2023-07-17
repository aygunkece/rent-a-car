<?php

namespace App\Http\Controllers\Rsa;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\LanguageStoreRequest;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Services\LanguageService;

class LanguageController extends Controller
{

    public function __construct(public LanguageService $languageService)
    {
    }

    public function index()
    {
        $languages = $this->languageService->getAllLanguages();
        return view('admin.languages.list', compact('languages'));
    }

    public function create()
    {
        return view('admin.languages.create-update');
    }

    public function store(LanguageStoreRequest $request)
    {
        $data = $request->except('_token');
        $this->languageService->create($data);

        return redirect()->route('language.index');
    }

    public function changeStatus(Request $request)
    {
        $language = $this->languageService->getById($request->id);
        $this->languageService->setLanguage($language)->updateStatus($language->status);
        $resultStatus = $this->languageService->getById($request->id)->status;

        return response()->json(['status' => 'success', 'message' => 'Başarılı', 'lang_status' => $resultStatus])->setStatusCode(200);
    }

    public function edit(Request $request)
    {
        $language = $this->languageService->getById($request->id);
        return view('admin.languages.create-update', compact('language'));
    }

    public function update(LanguageStoreRequest $request)
    {
        $data = $request->except('_token');
        $lang = $this->languageService->getById($request->id);
        $this->languageService->setLanguage($lang)->update($data);

        return redirect()->route('language.index');
    }
}
