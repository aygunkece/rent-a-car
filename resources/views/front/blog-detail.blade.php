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
                    <div class="col-md-8  padd-lr0 ">
                        <article class="wheel-blog-item wheel-blog-post-item">
                            <div class="wheel-blog-data">
                                <i>29 April</i>
                            </div>
                            <div class="wheel-blog-logo"><img src="images/i24.jpg" alt=""></div>
                            <header class="wheel-blog-header">
                                <h5>Seamlessly generate focused content for robust infrastructures Credibly</h5>
                            </header>
                            <div class="wheel-blog-links clearfix">
                                <ul>
                                    <li><a href="" class="fa fa-user">Anthony Doe</a></li>
                                    <li><a href="" class="fa fa-tags">Shopping, Branding</a></li>
                                    <li><a href="" class="fa fa-comments">17 Comments</a></li>
                                </ul>
                            </div>
                            <div class="wheel-blog-info">
                                <span>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet vulputate cursus a sit amet mauris. </span>
                                <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. </p>
                                <blockquote class="fa fa-quote-left">
                                    <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.</p>
                                </blockquote>
                                <p>Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue.</p>
                            </div>
                        </article>
                       @include("layouts.sections.front.article-comments")
                        @include("layouts.sections.front.article-reply-form")
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
        </div>
    </section>
    @if(1<2)
        @include("layouts.sections.front.subscribe")
    @endif
@endsection

@section("js")
@endsection
