@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Hakkımızda
@endsection
@section("content")
    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>About Us</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">About</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
   @include("layouts.sections.front.who-we-are")
    @include("layouts.sections.front.our-mission")
    @include("layouts.sections.front.our-ability")
    @include("layouts.sections.front.members")
    @include("layouts.sections.front.partners")

    @if(1<2)
        @include("layouts.sections.front.subscribe")
    @endif
@endsection

@section("js")
@endsection
