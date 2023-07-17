@extends("layouts.admin")
@section('title')
    Admin Panel
@endsection
@section("css")
@endsection

@section("content")

    <x-bootstrap.table
        :class="'table-responsive table table-hover'"
        :is-responsive="1"
    >
        <x-slot:columns>
            <th>Status</th>
            <th>Döviz Adı</th>
            <th>Döviz Kodu</th>
            <th>Alış Kuru</th>
            <th>Satış Kuru</th>
            <th>Actions</th>
        </x-slot:columns>
        <x-slot:rows>
            @foreach($rate as $item)
                <tr>
                    <td>
                        @if($item->status)
                            <a href="javascript:void(0)" class="btn btn-success btn-sm btnChangeStatus" data-id="{{ $item->id }}">Aktif</a>
                        @else
                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm btnChangeStatus" data-id="{{ $item->id }}">Pasif</a>
                        @endif
                    </td>

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->currency_code }}</td>
                    <td>{{ $item->buying_rate }}</td>
                    <td>{{ $item->selling_rate }}</td>
                    <td>
                        <div class="d-flex">
                            <a data-id="" href="{{ route('exchange.exchangeRates.edit', ['id' => $item->id]) }}"
                               class="btn btn-warning btn-sm btnEdit me-2">
                                <i class="fa fa-edit ms-0"></i>
                            </a>
                            <a data-id="" href="{{ route("exchange.history", ['currency_code' => $item->currency_code]) }}"
                               class="btn btn-primary btn-sm btnEdit me-2">
                                <i class="fa fa-eye ms-0"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </x-slot:rows>
    </x-bootstrap.table>

@endsection

@section("js")
    <script>
        $(document).ready(function () {

            $('.btnChangeStatus').click(function () {
                let exchangeID = $(this).data('id');
                let self = $(this);
                Swal.fire({
                    title: 'Status güncellemek istediğinize emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: 'Hayır',
                    cancelButtonText: "İptal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('exchange.change-status') }}",
                            data: {
                                exchangeID: exchangeID
                            },
                            async: false,
                            success: function (data) {
                                if (data.exchange_status) {
                                    self.removeClass("btn-secondary");
                                    self.addClass("btn-success");
                                    self.text("Aktif");
                                } else {
                                    self.removeClass("btn-success");
                                    self.addClass("btn-secondary");
                                    self.text("Pasif");
                                }

                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Status Güncellendi.",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function () {
                                console.log("hata geldi");
                            }
                        })
                    } else if (result.isDenied) {
                        Swal.fire({
                            title: "Bilgi",
                            text: "Herhangi bir işlem yapılmadı",
                            confirmButtonText: 'Tamam',
                            icon: "info"
                        });
                    }
                })

            });
        });
    </script>
@endsection
