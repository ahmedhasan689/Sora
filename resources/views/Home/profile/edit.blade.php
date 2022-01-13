@extends('layouts.Front-nav')

@section('content')
<!-- End Navegation -->
<div class="conatiner">
    <div class="row" style="margin-top: 110px">
        <div class="col-md-4">
            <nav class="edit-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="#">عام</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">اعدادات الحساب</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">كلمه السر</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">الاشعارات</a>
                </li>
            </nav>
        </div>

        <div class="col-md-8" style="left: 10%">
            <!-- Edit Page Profile -->
            <div class="row " id="edit-page-profile">
                <div class="col-md-12 ">
                    <div class="img-edit d-flex w-100 mx-auto">
                        <span class="image_edit_page">
                            <img src="{{ asset('uploads') . '/' . $profile->user->avatar }}" class="mr-3 image_edit_profile">
                        </span>

                        <span class="w-100 nameprofile-edit-page">
                            <a href="#" style="color: black;text-decoration: none;">
                                <p class="nameprofile-edit-name">
                                    {{ $profile->user->name }} / قم بتعديل الملف الشخصي
                                </p>
                            </a>
                            <br>
                            <span class="d-block w-100 ml-5 nameprofile-desc">قم بتعديل ملفك الشخصي بمعلوماتك الحقيقيه</span>
                        </span>


                    </div>

                </div>
                <div class="col-md-12 d-flex edit-form">
                    <div class=" mt-3 w-100 d-flex ">
                        <span style="margin-right: 13%" class=" w-100 d-flex ">
                            <span class="secound-image-edit">
                                <img src="{{ asset('uploads') . '/' . $profile->user->avatar }}" class="mr-3 rounded-circle edit-imagee"></span>
                            <span class="w-75 " style="text-align: right;">
                                <form enctype="multipart/form-data" action="{{ route('profile.update', ['id' => $profile->id]) }}" method="POST" style="display: initial;">
                                    @csrf
                                    @method('PUT')
                                    <!-- <input class="btn btn-outline-success mr-4 mt-4 btn-download" value="تحميل صورة جديدة" type="file"> -->

                                    <input type="button" class="btn btn-success" id="get_file" value="تحميل صورة جديدة">
                                    <input type="file" id="my_file" name="avatar">

                                    <!-- </input> -->
                                </form>
                                <form style="display: initial;">
                                    <button class="btn mr-2 mt-4 delete-photo">حذف</button>
                                </form>

                            </span>

                        </span>

                    </div>

                </div>
                <div class="col-md-12 ">
                    <div class=" mt-3  w-100 d-flex ">
                        <span style="margin-right: 14%" class=" w-100 d-flex">
                            <form class="form-group w-75 navbar-expand-sm" enctype="multipart/form-data" action="{{ route('profile.update', ['id' => $profile->id]) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <!-- Name Input -->
                                <label for="name" class=" w-100 " style="text-align: right;">الاسم</label>
                                <input type="text" value="{{ $profile->user->name }}" name="username" class="form-control" id="name">

                                <!-- Address Input -->
                                <label for="place" class=" w-100 mt-4 " style="text-align: right;">المنطقة</label>
                                <input type="text" name="country" value="{{ $profile->user->country->country_name }}" class="form-control" id="place">

                                <!-- Image_header Input -->
                                <label for="place" class=" w-100 mt-4 " style="text-align: right;">صورة الغلاف</label>
                                <div class="form-group" style="border: 1px solid #DDD; margin-top: 10px; margin-bottom: -10px; padding: 10px">
                                    <input type="file" class="form-control-file" name="image_header" id="exampleFormControlFile1">
                                </div>

                                <!-- Content Input -->
                                <label for="place" class=" w-100 mt-4 " style="text-align: right;">الوصف</label>
                                <textarea name="information" rows="5" cols="20" class="form-control font-weight-light">{{ $profile->information }}</textarea>


                                <button class="btn btn-outline-success mt-4 edit-submit">
                                    حفظ التغيرات
                                </button>
                            </form>
                        </span>

                    </div>
                    <div class="w-75 mx-auto" style="text-align: right;">
                    </div>

                </div>
            </div>

        </div>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script type="text/javascript" src="{{ asset('Front/js/Front.js') }}"></script>
    @endsection('content')
    </body>

    </html>