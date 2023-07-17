<?php

namespace App\Services;

use App\Models\Language;
use \Illuminate\Database\Eloquent\Collection;

class LanguageService
{
    public function __construct(public Language $language)
    {
    }

    public function getAllLanguages(): Collection
    {
        return $this->language::all();
    }

    public function create(array $data): Language
    {
        if (isset($data['status']))
        {
            $data['status'] = $data['status'] ? 1 : 0;
        }
        return $this->language::create($data);
    }

    public function getById(int $id): Language
    {
        return $this->language::query()
            ->where('id', $id)
            ->firstOrFail();
    }

    public function update(array $data): bool
    {
        if (isset($data['status']))
        {
            $data['status'] = 1;
        }
        else
        {
            $data['status'] = 0;
        }
        return $this->language->update($data);
    }

    public function setLanguage(Language $language): LanguageService
    {
        $this->language = $language;
        return $this;
    }

    public function updateStatus(int $status)
    {
        $this->language->status = $status ? 0 : 1;
        return $this->language->save();
    }
}
