@extends("layouts.auth")
@section('title')
    Company Parola Sıfırlama
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
                <h5 class="text-muted fw-normal mb-4">{{ __("company-reset-password.parolaSifirlama") }}</h5>
                <form class="forms-sample" action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">{{ __("company-reset-password.email") }}</label>
                        <input type="email" class="form-control" id="userEmail" placeholder="Email" name="email">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0 text-white">{{ __("company-reset-password.parolamiSifirla") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("js")

@endsection











