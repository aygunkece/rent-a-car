@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Kayıt Ol
@endsection
@section("content")
    <div class="wheel-start3">
        <img src="{{asset('wheel/images/bg7.jpg')}}" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Register</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">Register</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row ">
            <div class="mx-auto">
                <div class="wheel-register-sign marg-lg-t150 marg-lg-b150 marg-sm-t100 marg-sm-b100">
                    <div class="wheel-header">
                        <h5>Sign up Now </h5>
                        <h3>Get <span>Registered</span></h3>
                    </div>
                    <form action="{{ route('member.register') }}" method="post" id="form-register">
                        @csrf
                        <input type="text" placeholder="Full Name" name="fullname" id="fullname">
                        <input type="email" placeholder="Email" name="email" id="email">
                        <input type="password" placeholder="Password" name="password" id="password">
                        <input type="password" placeholder="Password Confirmation" name="password_confirmation"
                               id="password_confirmation">
                        <label for="input-val1">
                            <input type="checkbox" id='approval' name="approval"> <span>I agree with the </span>
                            <a href="">Terms and Conditions</a>
                        </label>
                        <button type="button" class="wheel-btn" id="btn-register">Sign Up</button>
                    </form>
                    <div class="wheel-register-link">
                        <a href="{{ route('social-login', ['driver' => 'google']) }}"
                           class="wheel-btn-link wheel-bg10">Sign in With Google</a>
                        @if(1<2)
                            <a href="" class="wheel-btn-link wheel-bg11">Register With Facebook</a>
                            <a href="" class="wheel-btn-link wheel-bg12">Register With Twitter</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(2<1)
        @include("layouts.sections.front.subscribe")
    @endif
@endsection

@section("js")
    <script>
        $(document).ready(function () {
            $('#btn-register').click(function () {

                let fullname = $('#fullname').val();
                let email = $('#email').val();
                let password = $('#password').val();
                let password_confirmation = $('#password_confirmation').val();

                if (fullname == '') {
                    Swal.fire({
                        title: 'Hata!',
                        text: 'Ad Soyadı Yazınız!',
                        icon: 'info',
                        confirmButtonText: 'Cool'
                    })
                } else if (email.trim() == '') {
                    Swal.fire({
                        title: 'Hata!',
                        text: 'email Adresi Yazınız!',
                        icon: 'info',
                        confirmButtonText: 'Cool'
                    })
                } else if (!emailControl(email)) {
                    Swal.fire({
                        title: 'Hata!',
                        text: 'email Adresinizi Kontrol Ediniz!',
                        icon: 'info',
                        confirmButtonText: 'Cool'
                    })
                } else if (password.trim() == '') {
                    Swal.fire({
                        title: 'Hata!',
                        text: 'Parolanızı Yazınız!',
                        icon: 'info',
                        confirmButtonText: 'Cool'
                    })
                } else if (password_confirmation.trim() == '') {
                    Swal.fire({
                        title: 'Hata!',
                        text: 'Parola Tekrarını Yazınız!',
                        icon: 'info',
                        confirmButtonText: 'Cool'
                    })
                } else if (password_confirmation !== password) {
                    Swal.fire({
                        title: 'Hata!',
                        text: 'Parola Tekrarı Doğru Değil!',
                        icon: 'info',
                        confirmButtonText: 'Cool'
                    })
                } else {
                    $('#form-register').submit();
                    Swal.fire({
                        title: 'Başarılı',
                        text: 'Kullanıcı Kaydı Başarıyla Oluşturuldu.',
                        icon: 'success',
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




