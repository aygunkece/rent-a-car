@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Blog
@endsection
@section("content")
<section class="wheel-bg2">
    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Our Blog</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////// -->
    <div class="wheel-blog-wrap marg-lg-t150  marg-sm-t50">
        <div class="container  ">
            <div class="row">
                <div class="col-md-8  padd-lr0">
                    @include("layouts.sections.front.blog-article-list")
                </div>
                <div class="col-md-4">
                    <aside class="wheel-widgets">
                        @include("layouts.sections.front.search-widget")
                        @include("layouts.sections.front.categories-widget")
                        @include("layouts.sections.front.popular-posts-widget")
                        @include("layouts.sections.front.tags-widget")
                    </aside>
                </div>
            </div>
        </div>
        @include("layouts.sections.front.paginate")
    </div>
</section>
@if(1<2)
    @include("layouts.sections.front.subscribe")
@endif
@endsection

@section("js")
@endsection
