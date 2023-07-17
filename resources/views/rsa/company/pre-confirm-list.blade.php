@extends("layouts.admin")
@section('title')
    {{ __('pre-confirm-list.title') }}
@endsection
@section("css")
@endsection

@section("content")

    <x-bootstrap.table
        :class="'table-responsive table table-hover'"
        :is-responsive="1"
    >
        <x-slot:columns>
            <th>#</th>
            <th>{{ __('pre-confirm-list.th-durum') }}</th>
            <th>{{ __('pre-confirm-list.th-firmaAdi') }}</th>
            <th>{{ __('pre-confirm-list.th-yetkiliAdSoyad') }}</th>
            <th>{{ __('pre-confirm-list.th-yetkiliEmail') }}</th>
            <th>{{ __('pre-confirm-list.th-telefonNo') }}</th>
            <th>{{ __('pre-confirm-list.th-mesaj') }}</th>
            <th>{{ __('pre-confirm-list.th-hareketler') }}</th>
        </x-slot:columns>
        <x-slot:rows>
            @foreach($list as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>
                        @if($item->status)
                            <a href="javascript:void(0)"
                               class="btn btn-success btn-sm btnEdit me-2 btnChangeStatus" data-id="{{ $item->id }}">
                                {{ __('pre-confirm-list.btn-onayVerildi') }}
                            </a>
                        @else
                            <a href="javascript:void(0)"
                               class="btn btn-secondary btn-sm btnEdit me-2 btnChangeStatus" data-id="{{ $item->id }}">
                                {{ __('pre-confirm-list.btn-onayBekliyor') }}
                            </a>
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->auth_name }}</td>
                    <td>{{ $item->auth_email }}</td>
                    <td>{{ $item->auth_phone }}</td>
                    <td><span data-bs-container="body" data-toggle="tooltip" data-placement="top"
                              title="{{ substr( $item->message , 0, 300) }}">
                        {{ substr($item->message,0, 20) }}</td>
                    <td>
                        <div class="d-flex">
                            <a data-id="" href=""
                               class="btn btn-warning btn-sm btnEdit me-2">
                                <i class="fa fa-key ms-0"></i>
                            </a>
                            <a data-id="" href="javascript:void(0)"
                               class="btn btn-danger btn-sm btnDelete "
                               data-name=""
                            >
                                <i class="fa fa-trash ms-0"></i>
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
                let companyID = $(this).data('id');
                let self = $(this);
                Swal.fire({
                    title: '{{ __('sweet-alert.alert-onOnay') }}',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: '{{ __('sweet-alert.alert-evet') }}',
                    denyButtonText: '{{ __('sweet-alert.alert-hayir') }}',
                    cancelButtonText: "{{ __('sweet-alert.alert-iptal') }}"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('company.preConfirm') }}",
                            data: {
                                companyID: companyID
                            },
                            async: false,
                            success: function (data) {
                                if (data.company_pre_confirm) {
                                    self.removeClass("btn-danger");
                                    self.addClass("btn-success");
                                    self.text("{{ __('sweet-alert.alert-aktif') }}");
                                } else {
                                    self.removeClass("btn-success");
                                    self.addClass("btn-danger");
                                    self.text("{{ __('sweet-alert.alert-pasif') }}");
                                }

                                Swal.fire({
                                    title: "{{ __('sweet-alert.alert-basarili') }}",
                                    text: "{{ __('sweet-alert.alert-onOnayVerildi') }}",
                                    confirmButtonText: '{{ __('sweet-alert.alert-tamam') }}',
                                    icon: "success"
                                });
                            },
                            error: function () {
                                console.log("{{ __('sweet-alert.alert-hataGeldi') }}");
                            }
                        })
                    } else if (result.isDenied) {
                        Swal.fire({
                            title: "{{ __('sweet-alert.alert-bilgi') }}",
                            text: "{{ __('sweet-alert.alert-herhangiBirİslemYapilmadi') }}",
                            confirmButtonText: '{{ __('sweet-alert.alert-tamam') }}',
                            icon: "info"
                        });
                    }
                })

            });
        });
    </script>
@endsection
