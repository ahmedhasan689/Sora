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


                                <button class="btn btn-outline-success  mr-4 mt-4 btn-download" style="background-color: #37BF80;border-radius:10px;color: white;font-size: 16px;height: 35px">
                                    تحميل صورة جديدة 
                                </button>



                                <button class="btn  mr-2   mt-4 " style="background-color: #E8E8E8;border-radius:10px;color: #4F4F4F;font-size: 16px;height: 35px; border: 1px solid #929292;font-weight: 100">حذف</button>
                            </span>

                        </span>

                    </div>

                </div>
                <div class="col-md-12 ">
                    <div class=" mt-3  w-100 d-flex ">
                        <span style="margin-right: 14%" class=" w-100 d-flex">
                            <form class="form-group w-75 navbar-expand-sm ">
                                <label for="name" class=" w-100 " style="text-align: right;">الاسم</label>
                                <input type="text" value="{{ $profile->user->name }}" class="form-control" id="name">
                                <label for="place" class=" w-100 mt-4 " style="text-align: right;">المنطقة</label>
                                <input type="text" value="غزه الاراضي المحتله" class="form-control" id="place">
                                <label for="place" class=" w-100 mt-4 " style="text-align: right;">الوصف</label>
                                <textarea name="message" rows="5" cols="20" class="form-control font-weight-light">{{ $profile->information }}</textarea>
                            </form>
                        </span>

                    </div>
                    <div class="w-75 mx-auto" style="text-align: right;">
                        <button class="btn btn-outline-success mt-4" style="background-color: #37BF80;border-radius:10px;color: white;font-size: 16px;height: 35px">حفظ
                            التغيرات</button>
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
    <!--  <script type="text/javascript" src="js/js.js"></script> -->
    @endsection('content')
    </body>

    </html>