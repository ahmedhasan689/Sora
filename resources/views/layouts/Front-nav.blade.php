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
                                <button class="btn-sm add">
                                    <a href="{{ route('admin.index') }}" class="add-element">
                                        <div class="button-content">Login</div>
                                    </a>
                                </button>
                            </li>
                            @endguest
                            <!-- DropDownImg menu -->
                            <div class="dropdown-menu  mt-2 img-profilee" aria-labelledby="dropdownMenuprofile">
                                <!-- First Item In Menu -->
                                <a class="dropdown-item item-img" href="#" class="mr-4">
                                    @auth
                                    <img src="{{ 'uploads' . '/' . Auth::user()->avatar }}" class="rounded-circle" style="width: 30px; height: 30px ">

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
                        <div class="dropdown mr-4">
                            <!-- notifications Icon  -->
                            <i class=" fa fa-bell-o icon fa-lg fa-lg icon-not" id="dropdownMenuNavagation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- notifications Menu -->
                                <div class="dropdown-menu notfcation-scroller mt-2 menu-notf" style="overflow-x: hidden;overflow-y: scroll;height: 400px;" aria-labelledby="dropdownMenuNavagation">
                                    <!-- First Item In Menu -->
                                    <a href="#" class="dropdown-item pt-2 pb-2 first-item-not">الإشعارات</a>
                                    <!-- divider  -->
                                    <div class="dropdown-divider"></div>
                                    <!-- Secound Item In NotFi -->
                                    <a href="#" class="dropdown-item secound-item-not">
                                        <!-- Imag-Notifcation -->
                                        <img src="{{ asset('Front/img/4.jfif') }}" class="rounded-circle imag-Notifcation">
                                        <!-- Name-notification -->
                                        <span class="pr-2 Name-notification">أحمد عبد الرحمن </span>
                                        <!-- decription-notifcation -->
                                        <span class="desc-notf">قام بمتابعتك<br>
                                            <span class="mr-3 desc-notf-end">منذ دقيقه واحد</span></span>
                                        <!-- End Secound item in Menu -->
                                    </a>
                                    <!-- Divider -->
                                    <div class="dropdown-divider"></div>
                                    <!-- Thierd Item in Notifcation -->
                                    <a href="#" class="dropdown-item therd-item-not">
                                        <!-- Imag-Notifcation -->
                                        <img src="{{ asset('Front/img/4.jfif') }}" class="rounded-circle imag-Notifcation">
                                        <!-- Name -notifcation -->
                                        <span class="pr-2 Name-notification">أعجب بصوره
                                            <!-- Decription Notifcation -->
                                            <span class="desc mr-2 desc-notf">قام بمتابعتك<<br>
                                                    <!-- content Notifcation test -->
                                                    <span class="mr-3 content-not-text">أسلاك مضيئه <span style="color: rgba(0,0,0,0.5);"> الخاصه
                                                            بك</span> </span>
                                                    <!-- Content Notifcation Image -->
                                                    <br><img src="{{ asset('Front/img/2.png') }}" class="rounded mr-5 content-not-img "><br>
                                                    <!-- Content Notifcation test -->
                                                    <span class="desc-notf-end" style="margin-right: 30px;">منذ دقيقه واحده</span>
                                    </a>


                                    <div class="dropdown-divider"></div>

                                    <!--4 Item in Nptifcation -->
                                    <a href="#" class="dropdown-item therd-item-not">
                                        <!-- Imag-Notifcation -->
                                        <img src="{{ asset('Front/img/4.jfif') }}" class="rounded-circle imag-Notifcation">
                                        <!-- Name -notifcation -->
                                        <span class="pr-2 Name-notification">أعجب بصوره
                                            <!-- Decription Notifcation -->
                                            <span class="desc mr-2 desc-notf">قام بمتابعتك<<br>
                                                    <!-- content Notifcation test -->
                                                    <span class="mr-3 content-not-text">أسلاك مضيئه <span style="color: rgba(0,0,0,0.5);"> الخاصه
                                                            بك</span> </span>
                                                    <!-- Content Notifcation Image -->
                                                    <br><img src="{{ asset('Front/img/2.png') }}" class="rounded mr-5 content-not-img "><br>
                                                    <!-- Content Notifcation test -->
                                                    <span class="desc-notf-end" style="margin-right: 30px;">منذ دقيقه واحده</span>
                                    </a>

                                    <div class="dropdown-divider"></div>
                                </div>
                            </i>
                        </div>
                        <!-- Massenger Profile -->
                        <div class="dropdown mr-4 ">
                            <!-- Massenger Item -->
                            <i class="fa fa-comment-o icon fa-lg ss" id="dropdownMenuMassenger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">
                                <!-- Massenger Menu -->
                                <div class="dropdown-menu  mt-2 massenger" aria-labelledby="dropdownMenuMassenger" style="  overflow-y: scroll; width: 300px;height: 250px;">
                                    <!-- Item 1 -->
                                    <div class="dropdown-item" style="text-align: right;">
                                        <!-- Image Massenger -->
                                        <img src="{{ asset('Front/img/4.jfif') }}" class="rounded-circle massenger-img">
                                        <!-- Name Massenger -->
                                        <span class="pr-2 name-massengerr" style="font-weight: bold;">أحمد عبد الرحمن </span>
                                        <!-- Time Massenger -->
                                        <span class="time-massenger">الساعه 2</span>
                                        <!-- Description Massenger -->
                                        <p style="font-size:14px; font-weight: bold;" class="pr-5 massenger-des">أريد التحدث معك في موضوع
                                            مهم جدا جدا</p>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="dropdown-item" style="text-align: right;">
                                        <!-- Image Massenger -->
                                        <img src="{{ asset('Front/img/4.jfif') }}" class="rounded-circle" style="width: 50px; height: 50px;margin-top: 10px">
                                        <!-- Name Massenger -->
                                        <span class="pr-2 name-massenger">أحمد عبد الرحمن </span>
                                        <!-- Time Massenger -->
                                        <span class="time-massenger">الساعه 2</span>
                                        <!-- Description Massenger -->
                                        <p style="font-size:14px; font-weight: bold; color: #929292" id="description-massengerr" class="pr-5 ">أريد التحدث معك في موضوع مهم جدا جدا</p>
                                        <div class="dropdown-divider"></div>
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="dropdown-divider"></div>
                                </div>
                            </i>
                        </div>
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