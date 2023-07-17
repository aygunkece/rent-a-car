@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Araç Detay Sayfası
@endsection
@section("content")
    <div class="wheel-start3 style-5">
        <img src="images/z-bg-11.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Listing Details</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> Listing </a></li>
                            <li class="active">Listing details</li>
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
    <div class="container-fluid padd-lr0">
        <div class="row padd-lr0">
            <div class="col-xs-12 padd-lr0">
                <div class="container padd-lr0 xs-padd">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="listing-hedlines t-center">
                                <h5 class="title">Lamborghini Sesto Elemento 2013</h5>
                                <div class="subtitle">Exotic Car Collection</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @include("layouts.sections.front.car-features-tabs")
                    </div>
                    <div class="row marg-lg-t55 marg-sm-t0 marg-sm-b0 marg-lg-b75">
                        <div class="col-xs-12 marg-lg-b75 marg-sm-b0 padd-lr0">
                            @include("layouts.sections.front.car-map")
                        </div>
                    </div>
                </div>
                <div class="container-fluid padd-lr0 z-bg-1">
                    <div class="row marg-lg-t75 marg-xs-t0">
                        <div class="col-xs-12 padd-lr0 xs-padd">
                            <div class="container padd-lr0 xs-padd">
                                <div class="row">
                                    <div class="col-xs-12 padd-lr0 xs-padd marg-lg-b90 marg-lg-t70 marg-sm-t30">
                                        <div class="wheel-header text-center">
                                            <h5>book now</h5>
                                            <h3>Make a <span>reservation</span></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row marg-lg-b20">
                                    <div class="col-xs-12 padd-lr0 xs-padd marg-lg-b60 marg-sm-b10">
                                        <div class="wheel-start-form wheel-start-form2    ">
                                            @include("layouts.sections.front.reservation")
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    @include("layouts.sections.front.car-extras")
                                    @include("layouts.sections.front.car-protection")
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="total-cost clearfix">
                                            <div class="title">Total Cost</div>
                                            <div class="price">$255<sup>00</sup></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row marg-lg-b80 marg-sm-b0">
                                    <div class="col-xs-12 marg-lg-t30 marg-lg-b70 t-center">
                                        <a href="#" class="wheel-btn type-2">Book now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-swiper-wrap">
                    <!-- /////////////////////////////////// -->
                    @include("layouts.sections.front.car-swiper-slide")
                    <!-- /////////////////////////////// -->
                </div>
                @if(1<2)
                    @include("layouts.sections.front.subscribe")
                @endif
            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
