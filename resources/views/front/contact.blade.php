@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | İletişim
@endsection
@section("content")
    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Get in touch</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("layouts.sections.front.contact-info")
    @include("layouts.sections.front.contact-form")
    @if(1<2)
        @include("layouts.sections.front.contact-map")
        @include("layouts.sections.front.subscribe")
    @endif
@endsection

@section("js")
@endsection
