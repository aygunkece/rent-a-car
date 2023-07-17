@extends("layouts.front")
@section("style")
    <style>
        .wheel-btn-2 {
            background-color: #ff7043;
            padding: 0 15px;
            line-height: 30px;
            color: white;
            font-size: 10px;
            display: inline-block;
            font-weight: 350;
            text-transform: uppercase;
            position: relative;
            border: none;
            transition: all 0.15s ease;
        &:before,
        &:after {
             content: '';
             display: inline-block;
             position: static;
             position: absolute;
         }
        &:after {
             top: 2px;
             right: 2px;
             width: 0;
             height: 0;
             border-style: solid;
             border-width: 0 5px 5px 0;
             border-color: transparent #ffffff transparent transparent;
         }
        &:before {
             bottom: 2px;
             left: 2px;
             width: 0;
             height: 0;
             border-style: solid;
             border-color: transparent transparent transparent #ffffff;
         }
        &:before {
             border-width: 15px 0 0 15px;
         }
        &:after {
             border-width: 0 15px 15px 0;
         }
        &:hover {
             background-color: #404040;
             color: #fff;
         }
        }


         #image {
             max-width: 250px;
             max-height: 250px;
             width: auto;
             height: auto;
         }

    <img class="img-lg rounded-circle mb-5" id="image" src="{{ isset($member) ? $member->image : "" }}" alt="Profile image">


    </style>
@endsection
@section("title")
    VIP Rent A Car | İletişim
@endsection
@section("content")
    <div class="wheel-start3">
        <img src="images/bg7.jpg" alt="" class="wheel-img">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 padd-lr0">
                    <div class="wheel-start3-body clearfix marg-lg-t255 marg-lg-b75 marg-sm-t190 marg-xs-b30">
                        <h3>Get in touch</h3>
                        <ol class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li><a href="#"> pages </a></li>
                            <li class="active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="wheel-header text-center marg-lg-t85 marg-lg-b90  marg-md-t50">
                    <h5>Merhaba </h5>
                    <h3>Send Us a <span>Message</span></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 padd-lr0">
                <div class="text-center marg-lg-b145">
                    <form class="form" id="memberForm" action="{{route('member.edit',['member'=>$member->id])}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-md-4 offset-md-4">
                                <img class="img-lg rounded-circle mb-5" id="image" src="{{ isset($member) ? $member->image : "" }}" alt="Profile image">
                                <input type="text" id="fullname" class="w-100 form-control mb-3" name="fullname" placeholder="Name" value="{{ isset($member) ? $member->fullname : ""}}">
                                <input type="number" id="identityNumber" class="w-100 form-control mb-3" name="identity_number" placeholder="TC No" value="{{ isset($member) ? $member->identity_number : ""}}">
                                <input type="email" id="email" class="w-100 form-control mb-3" name="email" placeholder="Email" value="{{ isset($member) ? $member->email : ""}}">
                                <input type="text" id="phoneNumber" class="w-100 form-control mb-3" name="phone" placeholder="Phone" value="{{ isset($member) ? $member->phone : ""}}">
                                <input type="text" id="birthday" data-inputmask="'mask:99.99.9999" class="w-100 form-control mb-3" name="birthday" value="{{ isset($member) ? $member->birthday : ""}}">
                                <input type="text" id="gender" class="w-100 form-control mb-3" name="gender" placeholder="Cinsiyet" value="{{ isset($member) ? $member->gender : ""}}">
                                <input type="password" id="password" class="w-100 form-control mb-3" name="password" placeholder="Parolanız" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4 offset-md-4">
                                <div class="input-group">
                                    <input type="text" id="thumbnail" name="image" class="w-75 form-control" placeholder="Profil Resmi Yükle" value="{{ isset($member) ? $member->image : "" }}">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn wheel-btn-2">Yükle</a>
                                    <img id="holder" style="margin-top:15px;max-height:100px;">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-4 offset-md-4">
                                <button class="wheel-btn mt-3" id="btnSave">Kaydet</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @if(1>2)
        @include("layouts.sections.front.subscribe")
    @endif
@endsection

@section("js")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
       let name = $('#fullname');
       let email = $('#email');
       let password = $('#password');
       let phoneNumber = $('#phoneNumber');
       let birthday = $('#birthday');
       let gender = $('#gender');
       let identityNumber = $('#identityNumber');

       $(document).ready(function () {

           $('#lfm').filemanager('image');
           $('#birthday').mask('00.00.0000');
           $('#btnSave').click(function () {
               if (name.val().trim() === "" || name.val().trim() == null) {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Ad soyad alanı boş geçilemez",
                       confirmButtonText: 'Tamam',
                       icon: "info"
                   });
               } else if (identityNumber.val().trim() === "" || identityNumber.val().trim() == null) {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Kullanıcı TC Kimlik no alanı boş geçilemez",
                       confirmButtonText: 'Tamam',
                       icon: "info"
                   });
               }
               else if (email.val().trim() === "" || email.val().trim() == null) {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Kullanıcı email alanı boş geçilemez",
                       confirmButtonText: 'Tamam',
                       icon: "info"
                   });
               }
                   @if(!isset($member))
               else if (password.val().trim() === "" || password.val().trim() == null) {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Kullanıcı parola alanı boş geçilemez",
                       confirmButtonText: 'Tamam',
                       icon: "info"
                   });
               }
                   @endif
               else if (phoneNumber.val().trim() === "" || phoneNumber.val().trim() == null) {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Kullanıcı telefon numarası alanı boş geçilemez",
                       confirmButtonText: 'Tamam',
                       icon: "info"
                   });
               } else if (birthday.val().trim() === "" || job.val().trim() == null) {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Kullanıcı meslek alanı boş geçilemez",
                       confirmButtonText: 'Tamam',
                       icon: "info"
                   });
               } else if (gender.val().trim() === "" || job.val().trim() == null) {
                   Swal.fire({
                       title: "Uyarı",
                       text: "Kullanıcı meslek alanı boş geçilemez",
                       confirmButtonText: 'Tamam',
                       icon: "info"
                   });
               }
               else {
                   $("#memberForm").submit();
               }
           });
       });
   </script>
@endsection
