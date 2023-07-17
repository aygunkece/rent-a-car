@extends("layouts.front")
@section("style")
@endsection
@section("title")
    VIP Rent A Car | Member List
@endsection
@section("content")
    <div class="wheel-start3" style="background-image: url({{ asset("wheel/images/bg7.jpg") }});">
        <img src="{{ asset("wheel/images/bg7.jpg") }}" alt="" class="wheel-img" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Member List</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container no-padding">
        <div class="row">
            <div class="col-xs-12">
                <div class="">
                    <table class="table table-hover fs-5">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>
                                    <i class="fa fa-times"></i>
                                    <img src="{{ asset("wheel/images/i41.png") }}" alt="" class="img">
                                </td>
                                <td>{{ $member->fullname }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->birthday }}</td>
                                <td>{{ $member->gender }}</td>
                                <td>{{ $member->status }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
