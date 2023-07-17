@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Rezervasyon
@endsection
@section("content")
    <div class="wheel-start3 style-5">
        <img src="images/z-bg-11.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Reservation</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Reservation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="imgOnBanner-wrap">
            <img src="images/z-banner-img.png" alt="" class="imgOnBanner img-responsive">
        </div>
    </div>
    <div class="wheel-start wheel-start2">
        <img src="{{ asset("images/bg5.jpg") }}" alt="" class="wheel-img">
    </div>
    <div class="step-wrap">
        @include("layouts.sections.front.reservation-timeline")
    </div>
    <div class="reservation">
        <div class="container padd-lr0 marg-lg-t100 marg-lg-b100 marg-xs-t0 marg-xs-b0">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    @include("layouts.sections.front.reservation")
                </div>
            </div>
        </div>
    </div>
    @include("layouts.sections.front.comments-swiper-slide")
    @if(1<2)
        @include("layouts.sections.front.subscribe")
    @endif
@endsection

@section("js")
@endsection
