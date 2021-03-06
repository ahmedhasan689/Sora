<!DOCTYPE html>
<html>

<head>
    <title>
        @yield('title')
    </title>
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
    <title>

    </title>
    <!-- Fonts -->

    <!--  -->

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('Front/css/font-awesome.min.css') }}">

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
                            <img src="{{ Auth::user()->image }}" class="rounded-circle img-profile" id="dropdownMenuprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @endauth

                            @guest
                            <li class="nav-item col-md-2 d-flex flex-row-end" style="margin-right: 150px">
                                <!-- <button class="btn-sm add" style="border: none;">
                                    <a href="" class="btn btn-success" data-toggle='modal' data-target="#signupPage"></a>
                                </button> -->

                                <button class="btn-sm btn-add" style="margin-right: 10px; padding: 5px 15px;">
                                    <a href="" class="add-element" data-toggle='modal' data-target="#signupPage">
                                        <div class="button-content">??????????????</div>
                                    </a>
                                </button>
                                <!-- <button class="btn-sm add" style="border: none;">
                                    <a href="" class="btn btn-success" data-toggle='modal' data-target="#loginPage">?????????? ????????????</a>
                                </button> -->

                                <button class="btn-sm btn-add" style="margin-right: 10px; padding: 5px 8px;">
                                    <a href="" class="add-element" data-toggle='modal' data-target="#loginPage">
                                        <div class="button-content" style="width: 80px;">?????????? ????????????</div>
                                    </a>
                                </button>
                            </li>
                            @endguest
                            <!-- DropDownImg menu -->
                            <div class="dropdown-menu  mt-2 img-profilee" aria-labelledby="dropdownMenuprofile">
                                <!-- First Item In Menu -->
                                <a class="dropdown-item item-img" href="#" class="mr-4">
                                    @auth
                                    <img src="{{ Auth::user()->image  }}" class="rounded-circle" style="width: 30px; height: 30px ">

                                    <!--  Name -->
                                    <span class="pr-2" style=" font-weight:lighter;">{{ Auth::user()->name }}</span>
                                    <!-- Email -->
                                    <br><span class="email-profile" class="mb-1">{{ Auth::user()->email }}</span>
                                    <!-- Acount Managment -->
                                    </span>
                                    <br>
                                    <a href="{{ route('profile.index') }}">
                                        <span class="profile-mangment">?????????? ????????????</span>
                                    </a>
                                    @endauth

                                </a>

                                <a class="dropdown-item" class="items-image" href="#" style="text-align: right;font-size: 13px">??????????????????</a>
                                <a class="dropdown-item" class="items-image" href="#" style="text-align: right;font-size: 13px">????????????</a>
                                <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="{{ route('logout') }}" class="items-image" >?????????? ????????</a> -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" style="text-align: right;font-size: 13px; margin-bottom: 10px; float:right; background-color:#fff; border:none; margin-right: 10px; cursor:pointer">?????????? ????????????</button>
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
                            <div class="button-content">?????? ????????</div>
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
                        <form dir="ltr" action="{{ route('search') }}" method="GET">
                            @csrf
                            <div>
                                <div class="input-group">
                                    <!-- Search Element -->
                                    <button class="btn bg-transparent" style="position: absolute; top: 5px; z-index: 5; height: 37px; margin-top: -4; margin-left: 1px;">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                    <input type="search" dir="rtl" placeholder="???????? ??????????" name="query" class="form-control">
                                    <div class="input-group-append">
                                        <!-- Add Button -->
                                        <div class="btn-group">
                                            <button dir="rtl" type="button" class="btn  dropdown-toggle btn-inside-se" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                ????????
                                            </button>
                                            <!-- Btn DropDown -->
                                            <div class="dropdown-menu" style="border-radius: 20px; margin-top: 20px;">
                                                <a href="#" class="dropdown-item">
                                                    <input type="checkbox" class="form-check-input" id="checkbox-menu">
                                                    <label class="form-check-label btn " for="checkbox-menu"> ???????? </label>
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">
                                                    <input type="checkbox" class="form-check-input rounded" id="checkbox-menu">
                                                    <label class="form-check-label" for="checkbox-menu">??????????????</label>
                                                </a>

                                                <a href="#" class="dropdown-item">
                                                    <input name="person" type="checkbox" class="form-check-input rounded" id="checkbox-menu">
                                                    <label class="form-check-label" for="checkbox-menu"> ??????????</label>
                                                </a>

                                                <a href="#" class="dropdown-item">
                                                    <input name="type" type="checkbox" class="form-check-input rounded" id="checkbox-menu">
                                                    <label class="form-check-label" for="checkbox-menu"> ??????????????</label>
                                                </a>

                                            </div>
                                            <!-- End Button DropDwon -->

                                        </div>
                                        <!-- End Button Group -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- ?? End Form Search-->
                    </div>


                </li>
                <!-- End Secound Element In Header -->
                <!-- CopyRight Element -->
                <div class="dropdown mt-1 col-md-1 " id="CopyRight">
                    <i class="fa fa-navicon mt-1 icon-left" id="CopyRightt" style="color:#fff; font-size:28px;" id="dropdownMenuNavagation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">

                        <div dir="ltr" class="dropdown-menu  mt-4 p-1 ml-3" aria-labelledby="dropdownMenuNavagation" style="border-radius: 20px">


                            <a href="#" class="dropdown-item" style="text-align: right;font-size: 14px">
                                ???? ??????
                            </a>
                            <a href="#" class="dropdown-item" style="text-align: right;">
                                ?????????? ????????????????
                            </a>
                            <a href="#" class="dropdown-item" style="text-align: right;">
                                ???????? ??????????
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
            <div>
                <div class="modal-dialog">

                    <div>
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" style="color: white; padding-left: 50px; margin-top: 100px; background-color: #871010BA; padding: 9px 39px; z-index: 2; position: relative; width: 430px; margin-right: 40px;" />
                    </div>

                    <div class="modal-content w-75 mx-auto mt-5" style="border-radius: 10px;">

                        <div class="modal-header text-center">
                            <h4 class="modal-title text-center w-100 font-weight-bold mt-3">?????????? ???????? ????????</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></button>
                        </div>
                        <div class="modal-body mx-auto w-75">

                            <div class="" style="font-weight: 200;font-size: 12px;text-align: right;">
                                <p>?????????? ???????? ???????????? ?<a href="#" data-toggle='modal' data-target="#loginPage" data-dismiss="modal" style="color: green">?????????? ????????????</a></p>
                            </div>

                            <div class="md-form mb-5">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf



                                    <input type="text" class="form-control" id="name" name="name" :value="old('name')" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="??????????" wire:model="name">

                                    <br>

                                    <input id="email" name="email" type="email" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="???????????? ????????????????????" wire:model="email">

                                    <br>


                                    <input id="phone_number" name="phone_number" type="integer" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="?????? ????????????" wire:model="phone">
                                    <br>

                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="???????? ????????????" wire:model="password">

                                    <br>


                                    <input id="password_confirmation" type="password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" name="password_confirmation" required placeholder="?????????? ???????? ????????????" wire:model="re_password">

                                    <br>

                                    <input type="checkbox" class="form-check-input d-flex flex-row-start">

                                    <span style="font-weight: 200; font-size: 11px;text-align: right;margin-right: 13px;">?????????? ???????? ???????? ????????
                                        ?????? <span style="color: green;text-align: left;">
                                            ?????????? ?????? ???????????? ?????????????? ???????????? ??????????????</span>
                                    </span>

                                    <br>

                                    <input type="submit" wire:click.prevent="register" value="?????????? ???????? ????????" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;">

                                </form>

                            </div>

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
                        <h4 class="modal-title text-center w-100 font-weight-bold mt-3">???????? ???????? ????????????</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    <div class="modal-body mx-auto w-75">
                        <div class="" style="font-weight: 200;font-size: 12px;text-align: right;">
                            <p>???????? ?????????? ???????????? ???????????????????? ???????? ???????????????? ?????????? ?????????????? ???????????? ???????? ?????????? ?????? ?????????????? ???????????????? ???????? ????????
                                ???????????? ????</p>
                        </div>
                        <div class="md-form mb-5">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf


                                <input id="email" type="email" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="???????????? ????????????????????" name="email" :value="old('email')" required autofocus>

                                <input type="submit" value="??????????" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;">
                                <a href="#" style="color: black;text-align: right;text-decoration: none;">
                                    <p style="margin-top: 10px;font-size: 13px;">
                                        ???? ??????????
                                        <span style="color: green" data-toggle='modal' data-target="#loginPage" data-dismiss="modal">
                                            ?????????? ????????????
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
        <div class="modal fade mt-5" id="RestPassword">
            <div class="modal-dialog">
                <div class="modal-content w-75 mx-auto mt-5" style="border-radius: 10px;">

                    <div class="modal-header text-center">
                        <h4 class="modal-title text-center w-100 font-weight-bold mt-3">?????????? ???????? ???????? ????????</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close"><i class="fa fa-times" aria-hidden="true"></i></button>
                    </div>
                    <div class="modal-body mx-auto w-75">

                        <div class="md-form mb-5">
                            <form action="">


                            </form>
                            <input type="Password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="???????? ???????????? ??????????????"><br>

                            <input type="password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="?????????? ???????? ????????????">

                            <input type="submit" value="?????????? ????????????" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;margin-top: -20px;">
                            <div class="" style="font-weight: 200;font-size: 12px;text-align: right;margin-top: 20px;">
                                <p>???????? ???????? ??????????????<a href="#" style="color: green" data-toggle='modal' data-target="#loginPage" data-dismiss="modal">?????????? ????????????</a></p>
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
                            <h4 class="modal-title text-center w-100 font-weight-bold mt-3">???????? ???? ???? ???????? ???????? </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </button>
                        </div>



                        <!-- Move To Signup Model-->
                        <div class="modal-body mx-auto w-75">
                            <div class="" style="font-weight: bold;font-size: 15px;text-align: right;">
                                <p>
                                    ???????????? ???????? ??
                                    <a href="#" style="color: green; font-size: 15px" data-toggle='modal' data-target="#signupPage" data-dismiss="modal">
                                        ?????????? ???????? ????????
                                    </a>
                                </p>
                            </div>

                            <div class="md-form mb-5">

                                <!-- Email -->
                                <input type="email" id="login-email" name="email" :value="old('email')" class="form-control" style="background-color: #F6F6F6;border-radius: 10px" placeholder="???????????? ????????????????????">
                                <br>

                                <!-- Password -->
                                <input id="login-password" type="password" name="password" class="form-control" style="background-color: #F6F6F6;border-radius: 10px;margin-top: -10px" placeholder="???????? ????????????">

                                <br>


                                <div class="forget_password" style="text-align: right;">
                                    <a href="#" style="color: black;text-align: right;font-weight: bold;font-size: 14px" data-toggle='modal' data-target="#forget_password" data-dismiss="modal">???????? ???????? ???????????? ??</a>
                                </div>

                                <!-- Submit -->
                                <input id="form" type="submit" value="?????????? ????????????" class="btn btn-success mx-auto w-100 mt-4" style="border-radius: 10px;">
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <!-- End Login Model -->





    </main>

    
    