@extends("layouts.admin")
@section("title")
    Döviz {{ isset($exchange_rates) ? "Güncelleme" : "Ekleme" }}
@endsection
@section("style")
    <link rel="stylesheet" href="{{ asset("assets/plugins/flatpickr/flatpickr.min.css") }}"
          xmlns:x-slot="http://www.w3.org/1999/xlink">
    <link rel="stylesheet" href="{{ asset("assets/plugins/summernote/summernote-lite.min.css") }}">

@endsection

@section("content")
    {{dd($exchange)}}
    <x-bootstrap.card>
        <x-slot:title>
            Kur {{ isset($exchange) ? "Güncelleme" : "Ekleme" }}
        </x-slot:title>

        <x-slot:cardText>
            <form action="{{ isset($exchange) ? route('exchange.exchangeRates.edit', ['id' => $exchange->id]) : route('exchange.create') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="exchangeForm">
                @csrf
                <label for="name" class="form-label">Döviz Adı</label>
                <input type="text"
                       class="form-control form-control-solid-bordered m-b-sm
                               @if($errors->has("title"))
                                    border-danger
                               @endif
                               "
                       placeholder="Döviz Adı"
                       name="name"
                       id="name"
                       value="{{ isset($exchange) ? $exchange->name : "" }}"
                       required
                       {!! isset($exchange) ? "disabled" : "" !!}
                >
                @if($errors->has("title"))
                    {{ $errors->first("title") }}
                @endif
                <label for="currencyCode" class="form-label">Döviz Kodu</label>
                <input type="text"
                       class="form-control form-control-solid-bordered m-b-sm"
                       placeholder="Döviz Kodu"
                       name="currency_code"
                       id="currencyCode"
                       value="{{ isset($exchange) ? $exchange->currency_code : "" }}"
                    {!! isset($exchange) ? "disabled" : "" !!}
                >

                <label for="buyingRate" class="form-label">Alış Kuru</label>
                <input type="number"
                       class="form-control form-control-solid-bordered"
                       placeholder="Alış Kuru"
                       name="buying_rate"
                       value="{{ isset($exchange) ? $exchange->buying_rate : "" }}"
                       id="buyingRate"
                >
                <label for="sellingRate" class="form-label">Satış Kuru</label>
                <input type="number"
                       class="form-control form-control-solid-bordered"
                       placeholder="Satış Kuru"
                       name="selling_rate"
                       value="{{ isset($exchange) ? $exchange->selling_rate : "" }}"
                       id="sellingRate"
                >
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" value="1" id="status" {{ isset($exchange) && $exchange->status  ? "checked" : "" }}>
                    <label class="form-check-label" for="status">
                        Döviz Kuru Sitede Aktif Olarak Görünsün mü?
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="system_check" value="1" id="system_check" {{ isset($exchange) && $exchange->system_check  ? "checked" : "" }}>
                    <label class="form-check-label" for="system_check">
                        Döviz Kuru sistem tarafından otomatik güncellensin mi?
                    </label>
                </div>
                <hr>
                <div class="col-6 mx-auto mt-2">
                    <button type="button" class="btn btn-success btn-rounded w-100" id="btnSave">
                        {{ isset($exchange) ? "Güncelle" : "Kaydet" }}
                    </button>
                </div>
            </form>
            </div>
            </div>
        </x-slot:cardText>
    </x-bootstrap.card>
@endsection
@section("js")
    <script>
        $(document).ready(function ()
        {
            let name = $('#name');
            let currencyCode = $('#currencyCode');
            let buyingRate = $('#buyingRate');
            let sellingRate = $('#sellingRate');

            $('#btnSave').click(function () {
                if(name.val().trim() === "" || name.val().trim() == null)
                {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Döviz adı boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else if(currencyCode.val().trim().length < 2)
                {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Döviz kodu boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else if(buyingRate.val().trim() == null || buyingRate.val().trim() === "")
                {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Alış kuru boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else if(sellingRate.val().trim() == null || sellingRate.val().trim() === "")
                {
                    Swal.fire({
                        title: "Uyarı",
                        text: "Satış kuru boş geçilemez",
                        confirmButtonText: 'Tamam',
                        icon: "info"
                    });
                }
                else
                {
                    $("#exchangeForm").submit();
                }
            });
        });
    </script>

@endsection
