@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Firma Ön Kayıt Formu
@endsection
@section("content")
    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>{{ __('company-pre-register.onKayitFormu') }}</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">{{ __('company-pre-register.anasayfa') }}</a></li>
                            <li class="active">{{ __('company-pre-register.li-onKayitFormu') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="wheel-header text-center marg-lg-t85 marg-lg-b90  marg-md-t50">
                    <h5> {{ __('company-pre-register.h5-form') }} </h5>
                </div>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 padd-lr0">
                <form action="" class="contact-form" method="POST" id="preRegisterForm">
                    @csrf
                    <div class="wheel-contact-form text-center marg-lg-b145">
                        <input type="text" placeholder="{{ __('company-pre-register.firmaAdi') }}" id="companyName" name="name">
                        <input type="text" placeholder="{{ __('company-pre-register.adSoyad') }}" id="name" name="auth_name">
                        <input type="text" placeholder="{{ __('company-pre-register.telefonNo') }}" id="authPhone" name="auth_phone">
                        <input type="text" placeholder="{{ __('company-pre-register.email') }}" id="authEmail" name="auth_email">
                        <textarea placeholder="{{ __('company-pre-register.message') }}" id="message"
                                  name="message"></textarea>
                        <div class="form-check form-switch align-items-center d-flex">
                            <input class="form-check-input" type="checkbox" id="approveAgreementCheckbox" value="1"
                                   name="approve_agreement">
                            <h4 class="text-decoration-none mb-4" id="modalBtn" data-bs-toggle="modal"
                                data-bs-target="#agreementModal"
                                style="cursor:pointer">{{ __('company-pre-register.sözlesmeyiOkuVeOnayla') }}</h4>
                        </div>
                        <div class="text-center">
                            <button type="button" class="wheel-btn" id="btnSave">{{ __('company-pre-register.btn-gonder') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="agreementModal">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('company-pre-register.sozlesme') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias asperiores at, atque consectetur
                        debitis dicta dolores eligendi error impedit ipsam iste laborum nesciunt quas voluptate.
                        Lorem ipsum dolor sit amet,Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Consequuntur cum eaque in, magni odit qui reiciendis unde. A ab aliquid consectetur corporis
                        dicta ducimus eligendi, eveniet facere illum inventore ipsa, modi mollitia numquam porro
                        praesentium quis quo reiciendis rerum saepe suscipit temporibus veniam voluptates voluptatum.
                        Accusantium amet, assumenda at atque blanditiis consectetur dolorum eveniet ex ipsam iure, magni
                        modi nisi provident quo rem sed tempore! Accusantium, delectus eius error excepturi ipsa labore
                        natus nihil omnis optio provident, quisquam repellendus vel voluptate. Aspernatur, eveniet
                        facere, ipsam iusto laborum laudantium modi molestiae odit pariatur quod recusandae repellat
                        saepe! Ad beatae deserunt dolores doloribus earum esse neque quam quibusdam tempore? A aliquam
                        aliquid error, est fuga hic magnam maxime nam odio odit qui ullam. A consequatur cum dignissimos
                        quisquam. Alias at consequuntur corporis debitis, deleniti doloremque enim eos id ipsam itaque
                        laborum magnam minima nam necessitatibus nesciunt nisi nobis optio rem repellendus
                        repudiandae.consectetur adipisicing elit. Autem ipsam sint ullam? Ab amet, assumenda commodi
                        corporis dolorum earum laborum nobis odio quis ratione saepe sapiente temporibus vel velit
                        veniam? Ad culpa cum, dolore eos expedita explicabo illo iste iure laboriosam quam quas quod
                        quos rem, repudiandae sit tempora voluptatem voluptatum! Adipisci atque doloremque eius
                        laudantium pariatur porro! Dignissimos, dolore, iusto. Accusamus accusantium adipisci blanditiis
                        dolor dolorum eius est facilis fugiat, id illum ipsum maiores nam pariatur placeat porro
                        quibusdam quis ratione reiciendis sapiente sequi tempora vero voluptas! Aperiam atque dolore
                        ipsum nihil possimus quibusdam quisquam sapiente tempora tempore velit? Aut dignissimos, dolorem
                        earum enim in iure, minima nihil officiis pariatur placeat porro rem tempore ut! Accusamus
                        accusantium ad animi architecto aut consequuntur culpa debitis dicta distinctio et expedita
                        harum id, inventore magnam maxime, mollitia nesciunt nisi numquam perferendis quam repellendus
                        reprehenderit rerum vel voluptas voluptatem! Distinctio ex itaque veritatis?
                    </h3>
                </div>
                <div class="modal-footer d-flex mx-auto align-items-center">
                    <button type="button" class="btn btn-secondary px-3 py-3" data-bs-dismiss="modal">{{ __('company-pre-register.kapat') }}</button>
                    <button type="button" class="btn btn-primary px-3 py-3" id="btnAgreement">{{ __('company-pre-register.onayla') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        let companyName = $('#companyName');
        let authName = $('#name');
        let authEmail = $('#authEmail');
        let authPhone = $('#authPhone');
        let message = $('#message');
        let checkboxAgreement = $('#approveAgreementCheckbox');


        $(document).ready(function () {
            var agreementModal = document.getElementById('agreementModal')

            $('#modalBtn').click(function () {
                agreementModal.show();
            });

            $('#btnSave').click(function () {
                if (companyName.val().trim() === "" || companyName.val().trim() == null) {
                    Swal.fire({
                        title: "{{ __('sweet-alert.alert-title-uyari') }}",
                        text: "{{ __('sweet-alert.alert-text-firmaadibosgecilemez') }}",
                        confirmButtonText: '{{ __('sweet-alert.alert-tamam') }}',
                        icon: "info"
                    });
                } else if (authName.val().trim() === "" || authName.val().trim() == null) {
                    Swal.fire({
                        title: "{{ __('sweet-alert.alert-title-uyari') }}",
                        text: "{{ __('sweet-alert.alert-text-yetkiliAdiAlaniBosGecilemez') }}",
                        confirmButtonText: '{{ __('sweet-alert.alert-tamam') }}',
                        icon: "info"
                    });
                } else if (authEmail.val().trim() === "" || authEmail.val().trim() == null) {
                    Swal.fire({
                        title: "{{ __('sweet-alert.alert-title-uyari') }}",
                        text: "{{ __('sweet-alert.alert-text-emailBosGecilemez') }}",
                        confirmButtonText: '{{ __('sweet-alert.alert-tamam') }}',
                        icon: "info"
                    });
                } else if (authPhone.val().trim() === "" || authPhone.val().trim() == null) {
                    Swal.fire({
                        title: "{{ __('sweet-alert.alert-title-uyari') }}",
                        text: "{{ __('sweet-alert.alert-text-yetkiliTelefonNumarasiAlaniBosGecilemez') }}",
                        confirmButtonText: '{{ __('sweet-alert.alert-tamam') }}',
                        icon: "info"
                    });
                }
                else if (!checkboxAgreement.is(':checked') ) {
                    Swal.fire({
                        title: "{{ __('sweet-alert.alert-title-uyari') }}",
                        text: "{{ __('sweet-alert.alert-text-lufenSozlesmeyiOnaylayınız') }}",
                        confirmButtonText: '{{ __('sweet-alert.alert-tamam') }}',
                        icon: "info"
                    });
                }
                else {
                    $("#preRegisterForm").submit();
                }
            });

            $('#btnAgreement').click(function () {

                checkboxAgreement.prop('checked', 'true');
            });

        });
    </script>

    <script>
        $(document).ready(function () {
            $('#btn-login').click(function () {
                let email = $('#email').val();
                let password = $('#password').val();
                if (email.trim() == '')
                {
                    Swal.fire({
                        title: '{{ __('sweet-alert.alert-title-hata') }}',
                    text: '{{ __('sweet-alert.alert-text-emailAdresiYaziniz') }}',
                    icon: 'info',
                    confirmButtonText: 'Cool'
                })
                }
            else if (!emailControl(email))
                {
                    Swal.fire({
                        title: '{{ __('sweet-alert.alert-title-hata') }}',
                    text: '{{ __('sweet-alert.alert-text-emailAdresiniziKontrolEdiniz') }}',
                    icon: 'info',
                    confirmButtonText: 'Cool'
                })
                }
                else if(password.trim()== '')
                {
                    Swal.fire({
                        title: '{{ __('sweet-alert.alert-title-hata') }}',
                    text: '{{ __('sweet-alert.alert-text-parolaniziYaziniz') }}',
                    icon: 'info',
                    confirmButtonText: 'Cool'
                })
                }
            else{
                    $('#btn-login').submit();
                    Swal.fire({
                        title: '{{ __('sweet-alert.alert-title-hata') }}',
                    text: '{{ __('sweet-alert.alert-text-emailAdresiYaziniz') }}',
                    icon: 'info',
                    confirmButtonText: 'Cool'
                })
                }
            });
            function emailControl(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
            }
        });
    </script>

@endsection
