@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Giriş Yap
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
        <div class="row">
            <div class="mx-auto">
                <div class="wheel-register-log marg-lg-t150 marg-lg-b150 marg-sm-t100 marg-sm-b100">
                    <div class="wheel-header">
                        <h5>have an account? Log In</h5>
                    </div>
                    <form action="{{ route('auth.member.login') }}" method="post" id="form-login">
                        @csrf
                        <label for="email" class="fa fa-email">
                            <input type="email" id="email" name="email" placeholder='Email'>
                        </label>
                        <label for="password" class="fa fa-lock">
                            <input type="password" id='password' name="password" placeholder='Passsword'>
                        </label>
                        <button type="button" class="wheel-btn" id="btn-login">Login Now</button>
                        <label class="password-sing clearfix" for="remember">
                            <input type='checkbox' id='remember' name="remember"> <span>Keep me signed in</span>
                            <a href="">Forgot password?</a>
                        </label>
                    </form>

                    <div class="wheel-register-link">
                        <a href="{{ route('social-login', ['driver' => 'google']) }}"
                           class="wheel-btn-link wheel-bg10">Sign in With Google</a>
                    @if(2<1)
                            <a href="" class="wheel-btn-link wheel-bg11">Sign in With Facebook</a>
                            <a href="" class="wheel-btn-link wheel-bg12">Sign in With Twitter</a>
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
            $('#btn-login').click(function () {

                let email = $('#email').val();
                let password = $('#password').val();
                if (email.trim() == '') {
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
                } else {
                    $('#form-login').submit();
                    Swal.fire({
                        title: 'Başarılı',
                        text: 'Giriş Başarılı!',
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
