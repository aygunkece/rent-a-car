@extends("layouts.auth")
@section('title')
    Company Login
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
                <a href="#" class="noble-ui-logo d-block mb-2">Vip<span>Rent A Car</span></a>
                <h5 class="text-muted fw-normal mb-4">Hoş geldiniz !</h5>
                <form class="forms-sample" action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">{{ __('company-login.email') }}</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="Email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="userPassword" class="form-label">{{ __('company-login.parola') }}</label>
                        <input type="password" class="form-control" id="userPassword" autocomplete="current-password"
                               placeholder="Parola" name="password">
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="authCheck" name="remember">
                        <label class="form-check-label" for="authCheck">
                            {{ __('company-login.benihatirla') }}
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">{{ __('company-login.btn-girisYap') }}</button>
                    </div>
                    <a href="{{ route('company.resetPassword') }}" class="d-block mt-3 text-muted">{{ __('company-login.parolamiUnuttum') }}</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection






