@extends('layouts.Front-nav')

@section('content')
<!-- End Navegation -->
<div class="row " id="edit-page-profile">
    <form class="form-group" enctype="multipart/form-data" action="{{ route('profile.update', ['id' => $profiles->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="col-md-4  w-100 ml-5" style="position: relative;">
                <div style="position: absolute;right: 0%;top: 150px; z-index: 3;text-align: center;font-size: 20px;margin-right: -60px;">
                    <nav class="edit-navigation">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">عام</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">اعدادات الحساب</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">كلمه السر</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="notification-tab" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false">الاشعارات</a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-md-8 d-flex">
                <div class="img-edit d-flex w-100 mx-auto">
                    <span class="image_edit_page">
                        <img src="{{ $profiles->user->image }}" name="avatar" class="mr-3 image_edit_profile">
                    </span>

                    <span class="w-100 nameprofile-edit-page">
                        <a href="#" style="color: black;text-decoration: none;">
                            <p class="nameprofile-edit-name"> {{ $profiles->user->name }} /
                        </a>
                        <span class="mr-3">
                            <a href="#" class="nameprofile-edit" style="text-decoration: none;color: black">
                                تعديل الملف الشخصي
                            </a>
                        </span>
                        <br>
                        <span class="d-block w-100 ml-5 nameprofile-desc">قم بتعديل ملفك الشخصي بمعلوماتك
                            الحقيقيه
                        </span>
                    </span>
                </div>

            </div>
            <div class="tab-content" id="myTabContent">

                <!-- Home Tap -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="col-md-12 d-flex">
                        <div class=" mt-4 w-100 d-flex ">
                            <span style="margin-right: 13%" class=" w-100 d-flex ">
                                <span class="secound-image-edit">
                                    <img src="{{ asset('Front/img/upload.png') }}" id="output" class="mr-3 rounded-circle edit-imagee"></span>
                                <span class="w-75 " style="text-align: right;">

                                    <input type="button" class="btn btn-success" name="avatar" id="get_file" value="تحميل صورة جديدة">
                                    <input type="file" id="my_file" name="avatar" onchange="loadFile(event)">

                                    <button class="btn mr-2 mt-4 " style="background-color: #E8E8E8;border-radius:10px;color: #4F4F4F;font-size: 16px;height: 35px; border: 1px solid #929292;font-weight: 100; margin-bottom: 20px;">حذف</button>
                                </span>

                            </span>

                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class=" mt-3  w-100 d-flex ">
                            <span style="margin-right: 14%" class=" w-100 d-flex">
                                <div class="w-75 navbar-expand-sm ">

                                    <label for="name" class=" w-100 " style="text-align: right;">الاسم</label>
                                    <input type="text" value="{{ $profiles->user->name }}" class="form-control" name="username" id="name">

                                    <label for="place" class=" w-100 mt-4 " style="text-align: right;">المنطقة</label>
                                    <input type="text" value="{{ $profiles->user->country->country_name }}" name="country" class="form-control" id="place">

                                    <label for="place" class=" w-100 mt-4 " style="text-align: right;">صورة الغلاف</label>
                                    <input type="file" value="{{ $profiles->image_header }}" class="form-control" name="image_header" id="exampleFormControlFile1" style="margin-top: 8px">

                                    <label for="place" class="w-100 mt-4" style="text-align: right;">الوصف</label>
                                    <textarea name="info" rows="5" cols="20" class="form-control font-weight-light">
                                    {{ $profiles->information }}
                                    </textarea>

                                </div>
                            </span>

                        </div>
                    </div>
                </div>
                <!-- End Home Tap -->

                <!-- Setting Tap -->
                <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">

                    <div class="col-md-12">
                        <div class=" mt-3  w-100 d-flex ">
                            <span style="margin-right: 14%" class=" w-100 d-flex">
                                <div class="w-75 navbar-expand-sm ">
                                    <div>
                                        <label for="name" class=" w-100 " style="text-align: right;">الايميل</label>
                                        <input type="email" value="{{ $profiles->user->email }}" class="form-control" name="email" id="email">
                                    </div>
                                    <div>
                                        <label for="name" class=" w-100 " style="text-align: right;">الاشتراك</label>
                                        <select class="form-control" name="subscription">
                                            @foreach ($subscriptions as $subscription)
                                            <option value="{{ $subscription->id }}" 
                                                <?php if ($profiles->user->subscription_id == $subscription->id) {
                                                     echo 'selected';
                                                } ?>
                                                >{{ $subscription->name }}</option>
                                            @endforeach
                                        </select>
                                    
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>

                </div>
                <!-- End Setting Tap -->

                <!-- Password Tap -->
                <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">

                    <div class="col-md-12">
                        <div class=" mt-3  w-100 d-flex ">
                            <span style="margin-right: 14%" class=" w-100 d-flex">
                                <div class="w-75 navbar-expand-sm ">
                                    <div>
                                        <label for="name" class=" w-100 " style="text-align: right;">كلمة السر</label>
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" id="name">
                                    </div>

                                    <label for="place" class=" w-100 mt-4 " style="text-align: right;">كلمة المرور الجديدة</label>
                                    <input type="password" name="new_password" class="form-control" id="place">

                                    <label for="place" class=" w-100 mt-4 " style="text-align: right;">تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control" name="repeat_password" id="exampleFormControlFile1" style="margin-top: 8px">


                                </div>
                            </span>
                        </div>
                    </div>

                </div>
                <!-- End Password Tap -->

                <!-- Notificaitons Tap -->
                <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                    <x-notifications-menu />
                </div>
                <!-- End Notificaitons Tap -->

                <div class="w-75 mx-auto" style="text-align: right;">
                    <button class="btn btn-outline-success mt-4" type="submit" style="background-color: #37BF80;border-radius:10px;color: white;font-size: 16px;height: 35px">
                        حفظ التغيرات
                    </button>
                </div>
            </div>


        </div>
        </p>
        </a>
        </span>
</div>
</form>
</div>



<!-- </div> -->
<!-- <div class="w-75 mx-auto" style="text-align: right;"> -->
<!-- </div> -->

<!-- </div> -->
<!-- </div> -->

<!-- </div> -->
<!-- </div> -->





<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('Front/js/Front.js') }}"></script>
@endsection('content')
</body>

</html>