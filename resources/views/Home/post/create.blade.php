@extends('layouts.Front-nav')

<div class="add" style="margin-top: 90px">

    @if ($errors->any())

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $message)
            <li>
                {{ $message }}
            </li>
            @endforeach
        </ul>
    </div>

    @endif



    <div class="container">
        <h3 class="mt-5 " style="text-align: center;">أضف جديد</h3>
        <form class="form-group" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Adress input -->
            <input type="text" class="form-control w-75 mx-auto mt-4 rounded font-weight-light" placeholder="أدخل العنوان" name="name">
            <!-- Description Input -->
            <textarea rows="5" cols="20" class="form-control w-75 mx-auto mt-3 font-weight-light" placeholder="أدخل الوصف" name="content"></textarea>

            <select class="custom-select" name="category_name">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
            <!--  -->
            <p class="font-weight-light mt-4" style="text-align: center;font-size: 20px">
                قم بتحميل الصوره الخاصه بك
            </p>

            <input type="file" id="file" class="file mx-auto w-75 form-control" name="image">


            <div class="row mt-3" style="margin-top: 40px !important;">
                <div class="col-md-6 d-flex w-50 btn-1" style="display: inline-block; margin-right: 12%; display: flex; flex-direction: row; flex-flow: nowrap;">

                    @if( Auth::user()->posts->count() == Auth::user()->subscriptions->number_of_image )
                    <span class="change-sub">
                        لقد انتهى أشتراكك ، يمكنك تجديده من
                        <a href="subscription.index">هنا</a>
                    </span>

                    <!-- <span>
                        Click To Change
                    </span> -->
                    <button class="btn btn-success" type="submit" disabled style="margin-right: -235px">نشر الان</button>
                    @elseif ( Auth::user()->posts->count() < Auth::user()->subscriptions->number_of_image )
                    <button class="btn btn-success" type="submit">نشر الان</button>
                    @endif
                </div>
                <div class="d-flex mx-auto  expand-sm">
                    <button class="btn btn-secondary " style="margin-right: 50px">ألغاء</button>
                </div>
            </div>
        </form>
        <div class="row">
            <!-- <div class="col-md-6 d-flex w-50 btn-1" style="display: inline-block; margin-right: 12%; display: flex; flex-direction: row; flex-flow: nowrap;">
                <button class="btn btn-success" type="submit">نشر الان</button> -->
            <!-- <button class="btn btn-secondary mr-4">حفظ كمسوده</button> -->
            <!-- </div> -->

        </div>
    </div>
</div>




<script type="text/javascript" src="js.js"></script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>