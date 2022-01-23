<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/general.css') }}">
</body>

</html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Fonts -->

    <!--  -->

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/font-awesome.min.css') }}">

    <title>Hello, world!</title>
    <style type="text/css">
        a {
            color: white;
        }
    </style>

</head>
<!-- End  </Bootstrap>    -->

<body dir="rtl" id="body">
    <!-- NavBar Element  ------------------------------>
    <nav class="navbar navbar-expand-lg  navbar-expand-md nav " style="position: fixed;width: 100% ; z-index: 2;top: 0px;left: 0px;right: 0px;">
        <!-- Brand And Links In Header -->
        <a class="navbar-brand" href="{{ route('front.home') }}">Sora</a>

        <a href="#" class="mr-4"><i class=" img-3" aria-hidden="true"></i></a>
        </div>
        <!-- End Brand And Links -->


        <!-- Button Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fa fa-navicon" style="color:#fff; font-size:28px;"></i>
            </span>
        </button>
        <!-- End Button Toggler -->



        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav w-100  ">

                <!-- Profile Element -->
                <div class="nav-item col-md-2 profile">
                    <div class="d-flex flex-row justify-content-center mt-2 nav-connection">

                        <!-- DropDown Image  -->
                        <div class="dropdown navbar-expand-md">
                            <!-- Image Profile -->
                            @auth
                            <img src="{{ asset('uploads') . '/' . Auth::user()->avatar }}" class="rounded-circle img-profile" id="dropdownMenuprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @endauth

                            @guest
                            <li class="nav-item col-md-2 d-flex flex-row-end">
                                <button class="btn-sm add" style="border: none;">
                                    <a href="" class="btn btn-success" data-toggle='modal' data-target="#signupPage">Sign up</a>
                                </button>
                                <button class="btn-sm add" style="border: none;">
                                    <a href="" class="btn btn-success" data-toggle='modal' data-target="#loginPage">login</a>
                                </button>
                            </li>
                            @endguest
                            <!-- DropDownImg menu -->
                            <div class="dropdown-menu  mt-2 img-profilee" aria-labelledby="dropdownMenuprofile">
                                <!-- First Item In Menu -->
                                <a class="dropdown-item item-img" href="#" class="mr-4">
                                    @auth
                                    <img src="{{ asset('uploads') . '/' . Auth::user()->avatar }}" class="rounded-circle" style="width: 30px; height: 30px ">

                                    <!--  Name -->
                                    <span class="pr-2" style=" font-weight:lighter;">{{ Auth::user()->name }}</span>
                                    <!-- Email -->
                                    <br><span class="email-profile" class="mb-1">{{ Auth::user()->email }}</span>
                                    <!-- Acount Managment -->
                                    </span>
                                    <br>
                                    <a href="{{ route('profile.index') }}">
                                        <span class="profile-mangment">أداره الحساب</span>
                                    </a>
                                    @endauth

                                </a>

                                <a class="dropdown-item" class="items-image" href="#" style="text-align: right;font-size: 13px">الاعدادات</a>
                                <a class="dropdown-item" class="items-image" href="#" style="text-align: right;font-size: 13px">مساعده</a>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="{{ route('logout') }}" class="items-image" >تسجيل خروج</a> -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="text-align: right;font-size: 13px; margin-bottom: 10px; float:right; background-color:#fff; border:none; margin-right: 10px; cursor:pointer">تسجيل الخروج</button>
                                </form>
                                <!-- End DropDownImg menu -->
                            </div>
                            <!-- End DropDown Image -->
                        </div>

                        @auth
                        <!-- notifications-profile -->
                        <x-notifications-menu />
                        @endauth
                        <!--  -->
                    </div>
                </div>

                @auth
                <!-- First Element In Header Add Button -->
                <li class="nav-item col-md-2 d-flex flex-row-end">
                    <button class="btn-sm btn-add">
                        <span class="icon-add rounded-circle"><i class="fa fa-plus-square-o" aria-hidden="true"></i></span>
                        <a href="{{ route('post.create') }}" class="add-element">
                            <div class="button-content">أضف جديد</div>
                        </a>
                    </button>
                </li>
                @endauth

                @guest
                <li class="nav-item w-100"></li>
                @endguest

                <!-- Secound Element In Header -->
                <li class="nav-item col-md-7 d-flex flex-row-start search">

                    <div class="col-lg-12 mx-auto">
                        <!-- Form incloud Add Button And Search -->
                        <form dir="ltr">
                            <div>
                                <div class="input-group">
                                    <!-- Search Element -->
                                    <input type="search" dir="rtl" placeholder="ماذا تفكر؟" class="form-control">
                                    <div class="input-group-append">
                                        <!-- Add Button -->
                                        <div class="btn-group">
                                            <button dir="rtl" type="button" class="btn  dropdown-toggle btn-inside-se" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                الكل
                                            </button>
                                            <!-- Btn DropDown -->
                                            <div class="dropdown-menu " style="border-radius: 20px; margin-top: 20px;">
                                                <a href="#" class="dropdown-item"><input type="checkbox" class="form-check-input" id="checkbox-menu">
                                                    <label class="form-check-label btn " for="checkbox-menu"> الكل </label>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="#" class="dropdown-item"><input type="checkbox" class="form-check-input rounded" id="checkbox-menu">
                                                        <label class="form-check-label" for="checkbox-menu"> الطبيعه</label>
                                                        <a href="#" class="dropdown-item"><input type="checkbox" class="form-check-input rounded" id="checkbox-menu">
                                                            <label class="form-check-label" for="checkbox-menu"> أشخاص</label>
                                                            <a href="#" class="dropdown-item"><input type="checkbox" class="form-check-input rounded" id="checkbox-menu">
                                                                <label class="form-check-label" for="checkbox-menu"> حيوانات</label>

                                                            </a>

                                            </div>
                                            <!-- End Button DropDwon -->

                                        </div>
                                        <!-- End Button Group -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- ُ End Form Search-->
                    </div>


                </li>
                <!-- End Secound Element In Header -->
                <!-- CopyRight Element -->
                <div class="dropdown mt-1 col-md-1 " id="CopyRight">
                    <i class="fa fa-navicon mt-1 icon-left" id="CopyRightt" style="color:#fff; font-size:28px;" id="dropdownMenuNavagation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">

                        <div dir="ltr" class="dropdown-menu  mt-4 p-1 ml-3" aria-labelledby="dropdownMenuNavagation" style="border-radius: 20px">


                            <a href="#" class="dropdown-item" style="text-align: right;font-size: 14px">
                                من نحن
                            </a>
                            <a href="#" class="dropdown-item" style="text-align: right;">
                                سياسه الخصوصيه
                            </a>
                            <a href="#" class="dropdown-item" style="text-align: right;">
                                حقوق النشر
                            </a>

                        </div>
                    </i>
                </div>
                <!-- End CopeRight Element -->


            </ul>

        </div>

    </nav>
    <main class="main-content">
        @yield('content')

        <!-- Start Signup Modal -->
        <div class="modal fade mt-5" id="signupPage">
            <div class="modal-dialog">
                <div class="modal-content w-75 mx-auto mt-5" style="border-radius: 10px;">

                    <div class="modal-header text-center">
                        <h4 class="modal-title text-center w-100 font-weight-bold mt-3">انشاء حساب جديد</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    <div class="modal-body mx-auto w-75">

                        <div class="" style="font-weight: 200;font-size: 12px;text-align: right;">
                            <p>ألديك حساب بالفعل ?<a href="#" data-toggle='modal' data-target="#loginPage" data-dismiss="modal" style="color: green">تسجيل الدخول</a></p>
                        </div>



                        <div class="md-form mb-5">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div>

                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                </div>


                                <input type="text" class="form-control" id="name" name="name" :value="old('name')" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="الاسم">

                                <br>

                                <input id="email" name="email" type="email" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="البريد الالكتروني">

                                <br>


                                <input id="phone_number" name="phone_number" type="integer" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="رقم الجوال">
                                <br>

                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="كلمة المرور">

                                <br>


                                <input id="password_confirmation" type="password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" name="password_confirmation" required placeholder="أعادة كلمة المرور">

                                <br>

                                <input type="checkbox" class="form-check-input d-flex flex-row-start">

                                <span style="font-weight: 200; font-size: 11px;text-align: right;margin-right: 13px;">انشاء حساب جديد يعني
                                    انك <span style="color: green;text-align: left;">
                                        توافق على سياسات الخددمه الخاصه بالموقع</span>
                                </span>

                                <br>

                                <input type="submit" value="انشاء حساب جديد" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;">




                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- End Signup Modal -->

        <!-- Forget Password -->
        <div class="modal fade mt-5" id="forget_password">
            <div class="modal-dialog">
                <div class="modal-content w-75 mx-auto mt-5" style="border-radius: 10px;">

                    <div class="modal-header text-center">
                        <h4 class="modal-title text-center w-100 font-weight-bold mt-3">نسيت كلمه المرور</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    <div class="modal-body mx-auto w-75">
                        <div class="" style="font-weight: 200;font-size: 12px;text-align: right;">
                            <p>ادخل عنوان البريد الالكتروني الذي استخدمته اثناء انضمامك وسنرسل اليك رساله على الايميل لاستعاده كلمه السر
                                الخاصه بك</p>
                        </div>
                        <div class="md-form mb-5">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf


                                <input id="email" type="email" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="البريد الالكتروني" name="email" :value="old('email')" required autofocus>

                                <input type="submit" value="ارسال" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;">
                                <a href="#" style="color: black;text-align: right;text-decoration: none;">
                                    <p style="margin-top: 10px;font-size: 13px;">
                                        لا تتذكر
                                        <span style="color: green" data-toggle='modal' data-target="#loginPage" data-dismiss="modal">
                                            تسجيل الدخول
                                        </span>
                                    </p>
                                </a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End Forget Password -->

        <!-- Reset Password -->
        <!-- Reset Password -->
        <div class="modal fade mt-5" id="RestPassword">
            <div class="modal-dialog">
                <div class="modal-content w-75 mx-auto mt-5" style="border-radius: 10px;">

                    <div class="modal-header text-center">
                        <h4 class="modal-title text-center w-100 font-weight-bold mt-3">اعادة تعين كلمة السر</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    <div class="modal-body mx-auto w-75">

                        <div class="md-form mb-5">
                            <form action="">


                            </form>
                            <input type="Password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="كلمه المرور الجديدة"><br>

                            <input type="password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="تأكيد كلمة المرور">

                            <input type="submit" value="اعادة التعين" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;margin-top: -20px;">
                            <div class="" style="font-weight: 200;font-size: 12px;text-align: right;margin-top: 20px;">
                                <p>لديك حساب بالفعل؟<a href="#" style="color: green" data-toggle='modal' data-target="#loginPage" data-dismiss="modal">تسجيل الدخول</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- End Reset Password -->

        <!-- Login Model  -->
        <div class="modal fade mt-5" id="loginPage">

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" style="color: white; padding-left: 50px; margin-top: 10px; background-color: #871010E6; padding: 9px 39px" />
                </div>
                <div class="modal-dialog">
                    <div class="modal-content w-75 mx-auto mt-5" style="border-radius: 10px;">


                        <div class="modal-header text-center">
                            <h4 class="modal-title text-center w-100 font-weight-bold mt-3">اهلا بك في منصه صوره </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>



                        <!-- Move To Signup Model-->
                        <div class="modal-body mx-auto w-75">
                            <div class="" style="font-weight: bold;font-size: 15px;text-align: right;">
                                <p>
                                    مستخدم جديد ؟
                                    <a href="#" style="color: green; font-size: 15px" data-toggle='modal' data-target="#signupPage" data-dismiss="modal">
                                        انشاء حساب جديد
                                    </a>
                                </p>
                            </div>

                            <div class="md-form mb-5">

                                <!-- Email -->
                                <input type="email" id="email" name="email" :value="old('email')" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="البريد الالكتروني">
                                <br>

                                <!-- Password -->
                                <input type="password" name="password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="كلمه المرور">

                                <br>


                                <div class="forget_password" style="text-align: right;">
                                    <a href="#" style="color: black;text-align: right;font-weight: bold;font-size: 14px" data-toggle='modal' data-target="#forget_password" data-dismiss="modal">نسيت كلمه المرور ؟</a>
                                </div>

                                <!-- Submit -->
                                <input type="submit" value="تسجيل الدخول" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;">
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <!-- End Login Model -->





    </main>