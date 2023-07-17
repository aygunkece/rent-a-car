@extends('layouts.admin')

@section('title')
    Dil {{ isset($language) ? 'Güncelleme' : 'Ekleme' }}
@endsection

@section('css')
@endsection

@section('content')
    <x-bootstrap.card>
        <x-slot:title>
            Dil {{ isset($language) ? 'Güncelleme' : 'Ekleme' }}
        </x-slot:title>
        <x-slot:cardText>
            <x-errors.any />
            <form  action="{{ isset($language) ? route('language.edit', ['id' => $language->id]) : route('language.create') }}"
                   class="forms-sample"
                   method="POST"
                   id="langForm">
                @csrf
                <div class="mb-3">
                    <label for="short_name" class="form-label">Kısa isim</label>
                    <input type="text"
                           name="short_name"
                           class="form-control"
                           id="short_name"
                           placeholder="Short Name"
                           required
                           value="{{ isset($language) ? $language->short_name : '' }}"
                    >
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">İsim</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           id="name"
                           placeholder="Name"
                           required
                           value="{{ isset($language) ? $language->name : '' }}"
                    >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Dil Açıklaması</label>
                    <textarea class="form-control" name="description" id="description" rows="3" style="resize: none;">{{ isset($language) ? $language->description : '' }}</textarea>
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" name="status" class="form-check-input" id="status"
                        {{ isset($language) && $language->status ? 'checked' :  '' }}>
                    <label class="form-check-label" for="status">
                        Dil Sitede Aktif Olsun mu?
                    </label>
                </div>
                <button type="button" class="btn btn-primary me-2" id="btnSave">Kaydet</button>
            </form>
        </x-slot:cardText>
    </x-bootstrap.card>
@endsection

@section('js')
    <script>

        let short_name = $('#short_name');
        let name = $('#name');

        $(document).ready(function () {
            $('#btnSave').click(function () {
                if (short_name.val().trim() == null || short_name.val().trim() === '')
                {
                    Swal.fire({
                        title: 'Uyarı',
                        text: 'Kisa isim boş geçilemez.',
                        confirmButtonText: 'Tamam',
                        icon: 'info',
                    });
                }
                else if (name.val().trim() == null || name.val().trim() === '')
                {
                    Swal.fire({
                        title: 'Uyarı',
                        text: 'İsim boş geçilemez.',
                        confirmButtonText: 'Tamam',
                        icon: 'info',
                    });
                }
                else
                {
                    $('#langForm').submit();
                }

            });
        });
    </script>
@endsection
