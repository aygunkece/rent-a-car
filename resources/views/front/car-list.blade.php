@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Araç Listesi
@endsection
@section("content")
    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Listing - List View</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Listing</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="prosuct-wrap">
        @include("layouts.sections.front.car-filter")
        <div class="container padd-lr0 xs-padd">
            @if(1<2)
                @include("layouts.sections.front.car-list-3-columns")
            @else
                @include("layouts.sections.front.car-list-grid")
            @endif

        </div>
        @include("layouts.sections.front.paginate")
    </div>
    <div class="wheel-start wheel-start2">
        <img src="{{ asset("images/bg5.jpg") }}" alt="" class="wheel-img">
    </div>
@endsection

@section("js")
@endsection
