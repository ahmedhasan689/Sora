@extends ('layouts.main')

@section('title')
<h3>
    أضافة مشرف
</h3>
@endsection

@section('breadcrumb')
<a href="{{ route('admin.index') }}">
    Admin
</a>
@endsection

@section('breadcrumb2')
<a href="{{ route('admin.create') }}">
    أضافة مشرف
</a>
@endsection

@section('content')

<form action=" route('')">
    <div class="form-row">

        <!-- Start Name -->
        <div class="form-group col-md-4">
            <label>الأسم</label>
            <input type="text" class="form-control" id="name" placeholder="أدخل الأسم">
        </div>

    </div>

    <div class="form-row">

        <!-- Start Number Phone -->
        <div class="form-group col-md-6">
            <label>رقم الجوال</label>
            <input type="text" class="form-control" id="phone_number" placeholder="أدخل رقم الجوال">
        </div>

        <!-- Start Email -->
        <div class="form-group col-md-6">
            <label>الايميل</label>
            <input type="email" class="form-control" id="Email" placeholder="أدخل الايميل">
        </div>
    </div>

    <!-- Start Password -->
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">كلمة المرور</label>
            <input type="password" class="form-control" id="password" placeholder="أدخل كلمة المرور">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword4">إعادة كلمة المرور</label>
            <input type="password" class="form-control" id="repeat-password" placeholder="أعد كتابة كلة المرور">
        </div>
    </div>

    <!-- Start Address  -->
    <div class="form-row">
        <!-- Country_name -->
        <div class="form-group col-md-4">
            <label for="inputState">الدولة</label>
            <select id="inputState" class="form-control">
                @foreach ($countries as $country)
                <option>{{ $country->country_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- City -->
        <div class="form-group col-md-6">
            <label for="inputCity">المدينة</label>
            <input type="text" class="form-control" id="inputCity">
        </div>

        <!-- Zip-code -->
        <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>

    </div>

    <div class="input-group mb-3">
        <label class="input-group">صورة</label>
        <input type="file" class="form-control" id="avatar">
    </div>

    <button type="submit" class="btn btn-success">أضافة</button>
</form>

@endsection