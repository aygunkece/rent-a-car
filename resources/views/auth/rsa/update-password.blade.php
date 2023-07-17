@extends("layouts.auth")
@section('title')
    Rsa Login
@endsection
@section("css")
@endsection

@section("content")
    <div class="row">
        <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper">
            </div>
        </div>

        <div class="col-md-8 ps-md-0">
            <div class="auth-form-wrapper px-4 py-5">
                <a href="#"
                   class="noble-ui-logo d-block mb-2">{{ isset($isResetPasswordPage) && $isResetPasswordPage ? "Parola Sıfırlama" : "Parolanızı Oluşturun" }}</a>
                <h5 class="text-muted fw-normal mb-4">Lütfen sisteme giriş yapabilmek için parolanızı belirleyiniz.</h5>
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form class="forms-sample" method="POST"
                      action="{{  route((isset($isResetPasswordPage) && $isResetPasswordPage ? 'rsa.resetPassword.assign' : 'rsa.passwordUpdate.token'), ["token" => $token]) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="Email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="userPassword" autocomplete="current-password"
                               placeholder="Password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="userPasswordConfirm" class="form-label">Password Confirm</label>
                        <input type="password" class="form-control" id="userPasswordConfirm"
                               autocomplete="current-password" placeholder="Password Confirm"
                               name="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <span>Parolanız en az 1 büyük, 1 küçük harf ve en az 1 özel karakter içermelidir.</span>
                        <span>En az 8 karakter en fazla 16 karakter uzunluğunda olmalıdır.</span>
                    </div>

                    <div>
                        <button class="btn btn-primary me-2 mb-2 mb-md-0 text-white" type="submit">Parola Oluştur
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection








