@extends("layouts.front")
@section("style")
    <link rel="stylesheet" href="{{ asset('assets/front/css/distance.css') }}">
@endsection
@section("title")
    VIP Rent A Car | Anasayfa
@endsection
@section("content")
    <div class="wheel-start wheel-start2">
        <img src="{{ asset("images/bg5.jpg") }}" alt="" class="wheel-img">
        <div class="container padd-lr0">
            <div class="col-lg-12  padd-lr0">
                <div class="wheel-start-form2 marg-lg-t310   marg-md-t0">
                    @include("layouts.sections.front.reservation")
                </div>
            </div>
            <div class="col-lg-12">
                <header class="wheel-header text-center marg-lg-t80 ">
                    <h1>Search - Hire - Compare - Save</h1>
                    <h5>We Help you Rent Car in 150+ Countries</h5>
                </header>
            </div>
        </div>
        <div class="wheel-service-img2">
            <img src="{{ asset("images/i1.png") }}" alt="" class="wheel-img2">
        </div>
    </div>
    <!-- ////////////////////////////////////////// -->
    @include("layouts.sections.front.four-blocks")
    <!-- ////////////////////////////////////////// -->
    @include("layouts.sections.front.our-mission")
    <!-- ////////////////////////////////////////// -->
    @include("layouts.sections.front.collections-slider")
    <!-- ////////////////////////////////////////// -->
    @include("layouts.sections.front.comments-swiper-slide")
    <!-- ////////////////////////////////////////// -->
    @include("layouts.sections.front.who-we-are")
    <!-- //////////////////////////////////////////-->
    @include("layouts.sections.front.how-it-works")
    <!-- ////////////////////////////////////////// -->
    @include("layouts.sections.front.news-blocks")
    <!-- ////////////////////////////////////////// -->
    @if(1>2)
        @include("layouts.sections.front.app-is-here")
    @endif
    <!-- ////////////////////////////////////////// -->
    @include("layouts.sections.front.subscribe")
@endsection

@section("js")
    <script src="https://api-maps.yandex.ru/2.1/?apikey=88799a6e-9f23-4964-a572-09e44fbbfdf4&lang=tr_TR" type="text/javascript"></script>
    <script src="{{ asset('assets/front/js/distance.js') }}"></script>
@endsection
