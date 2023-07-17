@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Checkout
@endsection
@section("content")

    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Checkout</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">Checkout</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /////////////////////////////////// -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 padd-lr0">
                <div class="wheel-billing">
                    <div class="wheel-header marg-lg-t140 marg-lg-b50 marg-sm-t100">
                        <h5>Billing Details</h5>
                    </div>
                    <form action="#">
                        <select class="selectpicker ">
                            <option>United States of America (USA)</option>
                            <option>UK</option>
                            <option>UA</option>
                        </select>
                        <select class="selectpicker ">
                            <option>State / County</option>
                            <option>Lviv</option>
                            <option>Kiev</option>
                        </select>
                        <input type="text" placeholder="First Name " class="wheel-half-width pull-left">
                        <input type="text" placeholder="Last Name  " class="wheel-half-width pull-right marg-r0">
                        <input type="text" placeholder="Company Name (Optional) ">
                        <input type="text" placeholder="Address Line 1">
                        <input type="text" placeholder="Address Line 2">
                        <input type="text" placeholder="City" class="wheel-half-width pull-left">
                        <input type="text" placeholder="ZIP / Postcode" class="wheel-half-width pull-right marg-r0">
                        <input type="text" placeholder="Email Address " class="wheel-half-width pull-left">
                        <input type="text" placeholder="Phone (Optional) " class="wheel-half-width pull-right marg-r0">
                        <label for="input-val8">
                            <input type="checkbox" id='input-val8'><span>Create an account?</span></label>
                        <input type="text" placeholder="Password " class="wheel-half-width pull-left">
                        <input type="text" placeholder="Confirm Password" class="wheel-half-width pull-right marg-r0">
                        <label for="input-val9">
                            <input type="checkbox" id='input-val9'><span>Ship to a different address?</span></label>
                        <textarea placeholder="Notes about your order "></textarea>
                    </form>
                </div>
            </div>
            <div class="col-md-6 padd-lr0">
                <div class="wheel-order marg-lg-t150 marg-lg-b150 marg-sm-b100 marg-sm-t100">
                    <div class="wheel-search-form clearfix">
                        <input type="text" placeholder="Coupon Code">
                        <button class="">Apply Coupon</button>
                    </div>
                    <div class="wheel-order-price marg-lg-t30 marg-lg-b30">
                        <div class="wheel-header ">
                            <h5>Your Order</h5>
                        </div>
                        <ul>
                            <li class="clearfix"><span>Porsche Cayman<i> x 1</i></span><b>$125,000.00</b></li>
                            <li class="clearfix"><span>Porsche Cayman<i> x 1</i></span><b>$125,000.00</b></li>
                            <li class="clearfix"><span>Order Subtotal</span><b>$350,000.00</b></li>
                            <li class="clearfix"><span>Shipping and Handling</span><b>$125.00</b></li>
                            <li class="clearfix wheel-total">
                                <h4>Order Total</h4>
                                <b>$350,125.00</b>
                            </li>
                        </ul>
                    </div>
                    <div class="wheel-payment marg-lg-t60 marg-lg-b30">
                        <div class="wheel-header ">
                            <h5>Payment Method</h5>
                        </div>
                        <form action="#">
                            <input type="radio" id='r1' name='payment'>
                            <label for="r1"><i></i>
                                <span>Direct Bank Transfer</span>
                            </label>
                            <p>Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit  </p>
                            <input type="radio" id='r2' name='payment'>
                            <label for="r2"><i></i>
                                <span>Cheque Payment</span>
                            </label>
                            <input type="radio" id='r3' name='payment'>
                            <label for="r3"><i></i>
                                <span>PayPal</span>
                            </label>
                            <label for="input-val10" class="wheel-agree">
                                <input type="checkbox" id='input-val10'>
                                <span>I agree with the</span>
                                <a href=""> Terms and Conditions</a>
                            </label>
                            <button>Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(1<2)
        @include("layouts.sections.front.subscribe")
    @endif
@endsection

@section("js")
@endsection
