@extends('layouts.Front-nav')

@section('content')


    <div class="edit-form-page" style="width: 75%; margin: 0 auto;">
        <div class="editProfile" style="display: flex; align-items: center; width: 50%; margin: 0 auto;">
            <div class="image"
                style="width: 60px; height: 60px; border-radius: 50%; overflow: hidden; position: relative;">
                <img style="position: absolute; top: 50%; left: 50%; transform: translate(-50% ,-50%); width: 100%;"
                    src=""
                    alt="">
            </div>
            <div class="information">
                <div class="ss">
                    <h5>احمد أبو حمدة / تعديل الملف الشخصي</h5>
                </div>
                <span>قم بتعديل ملفك الشخصي بمعلومات حقيقية</span>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <ul>
                    <li>
                        <a href="">عام</a>
                    </li>
                    <li>
                        <a href="">اعدادات الحساب</a>
                    </li>
                    <li>
                        <a href="">كلمة المرور</a>
                    </li>
                    <li>
                        <a href="">اشعارات</a>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <form>
                    <div class="top"
                        style="display: flex; justify-content: space-between; align-items: center; width: 40%;">
                        <div class="image"
                            style="width: 70px; height: 70px; border-radius: 50%; overflow: hidden; position: relative;">
                            <img style="position: absolute; top: 50%; left: 50%; transform: translate(-50% ,-50%); width: 100%;"
                                src=""
                                alt="">
                        </div>
                        <button style="background-color: green; border: none;" type="submit"
                            class="btn btn-primary">تعديل صورة جديدة</button>
                        <button style="background-color: gray; border: none;" type="submit"
                            class="btn btn-primary">حذف</button>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">الاسم</label>
                        <input type="text" class="form-control" value="احمد ابو حمدة" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">المنطقة</label>
                        <input type="text" class="form-control" value="الاراضي الفلسطينية - غزة" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">الوصف</label> <br>
                        <textarea style="width: 100%;" name="" id="">مصور محترف</textarea>
                    </div>

                    <button style="background-color: green; border: none;" type="submit" class="btn btn-primary">حفظ
                        التعديلات</button>
                </form>
            </div>
        </div>

    </div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('Front/js/Front.js') }}"></script>
@endsection
</body>

</html>