@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Sepet Sayfası
@endsection
@section("content")
    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Shopping Cart</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">Cart</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container no-padding">
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive wheel-cart">
                    <table class="wheel-table-cart marg-lg-t140 marg-md-t100 marg-sm-t80 marg-xs-t60">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <i class="fa fa-times"></i>
                                <img src="images/i41.png" alt="" class="img"> 2016 Honda Fit
                            </td>
                            <td>$125,000.00</td>
                            <td>
                                <div class="quantity-wrap">
                                    <i class="fa fa-minus"></i>
                                    <input type="number" name="quantity" class="input-quantity" value="1">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </td>
                            <td>$125,000.00</td>
                        </tr>
                        <tr>
                            <td class="column-pl">
                                <i class="fa fa-times"></i>
                                <img src="images/i42.png" alt="" class="img"> Porsche Cayman 2016
                            </td>
                            <td>$125,000.00</td>
                            <td>
                                <div class="quantity-wrap">
                                    <i class="fa fa-minus"></i>
                                    <input type="number" name="quantity" class="input-quantity" value="1">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </td>
                            <td>$125,000.00</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row marg-lg-t40 marg-lg-b40 marg-xs-b40">
            <div class="col-xs-12">
                <div class="s-cart-options">
                    <input type="text" placeholder="Coupon Code" class="wheel-field">
                    <a href="#" class="wheel-btn ">Apply Coupon</a>
                    <a href="#" class="wheel-btn ">Update Cart</a>
                    <a href="#" class="wheel-btn large pull-right">Proceed to checkout</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="s-cart-ship">
                    <h5 class="title">Calculate Shipping</h5>
                    <form action="/" class="s-ship-submit">
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
                        <input type="text" placeholder="Postcode / ZIP" class="s-ship-inp">
                        <button class="wheel-btn  pull-right" type="submit">ESTIMATE</button>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="wheel-order-price marg-lg-t30 marg-lg-b150 marg-sm-b100">
                    <div class="wheel-header ">
                        <h5>Cart Total</h5>
                    </div>
                    <ul>
                        <li class="clearfix"><span>Cart Subtotal </span><b>$125,000.00</b></li>
                        <li class="clearfix"><span>Shipping and Handling </span><b>$125,00</b></li>
                        <li class="clearfix wheel-total">
                            <h4>Cart Total</h4>
                            <b>$125,125.00</b>
                        </li>
                    </ul>
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
