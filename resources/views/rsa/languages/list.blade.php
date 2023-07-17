@extends('layouts.admin')

@section('title')
    Dil Listesi
@endsection

@section('css')
@endsection

@section('content')
    <x-bootstrap.card>
        <x-slot:title>
            Dil Listesi
        </x-slot:title>
        <x-slot:cardText>
            <x-bootstrap.table
            :is-responsive="1"
            >
                <x-slot:columns>
                    <th scope="col">Short Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </x-slot:columns>
                <x-slot:rows>
                    @foreach($languages as $language)
                        <tr id="row-{{ $language->id }}">
                            <td>{{ $language->short_name }}</td>
                            <td>
                                @if($language->status)
                                    <a href="javascript:void(0)" data-id="{{ $language->id }}" class="btn btn-success btn-sm btnChangeStatus">Aktif</a>
                                @else
                                    <a href="javascript:void(0)" data-id="{{ $language->id }}" class="btn btn-danger btn-sm btnChangeStatus">Pasif</a>
                                @endif
                            </td>
                            <td>{{ $language->name }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button"
                                        class="btn btn-primary p-1 lookDescription"
                                        data-bs-toggle="modal"
                                        data-bs-target="#description"
                                        data-desc="{{ $language->description }}" >
                                    <i class="link-icon" data-feather="eye"></i>
                                </button>
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('language.edit', ['id' => $language->id]) }}"
                                       class="btn btn-warning btn-sm p-1 text-white">
                                        <i class="link-icon" data-feather="edit-3"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-bootstrap.table>
        </x-slot:cardText>
    </x-bootstrap.card>

    <!-- Modal -->
    <div class="modal fade" id="description" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dil Açıklaması</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalBody">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $('.btnChangeStatus').click(function () {
                let id = $(this).data('id');
                let self = $(this);

                Swal.fire({
                    title: 'Status değiştirmek istediğinzden emin misiniz?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Evet',
                    denyButtonText: 'Hayır',
                    cancelButtonText: 'İptal'
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'POST',
                            url: "{{ route('language.change-status') }}",
                            data: {
                                '_method': 'PATCH',
                                id: id
                            },
                            async: false,
                            success: function (data) {
                                if (data.lang_status)
                                {
                                    self.removeClass('btn-danger');
                                    self.addClass('btn-success');
                                    self.text('Aktif');
                                }
                                else
                                {
                                    self.removeClass('btn-success');
                                    self.addClass('btn-danger');
                                    self.text('Pasif');
                                }

                                Swal.fire({
                                    title: "Başarılı",
                                    text: "Status değer güncellendi",
                                    confirmButtonText: 'Tamam',
                                    icon: "success"
                                });
                            },
                            error: function () {
                                console.log('işlem başarısız');
                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire({
                            title: 'Bilgi',
                            text: 'Herhangi bir işlem yapılmadı',
                            confirmButtonText: 'Tamam',
                            icon: 'info'
                        });
                    }
                })

            });

            $('.lookDescription').click(function () {
                let desc = $(this).data('desc');
                $('#modalBody').html(desc);
            });
        });
    </script>
@endsection
