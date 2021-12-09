@extends ('layouts.main')

@section('page_title', 'Add Category')

@section('title')
<h3>
    أضافة فئة
</h3>
@endsection

@section('breadcrumb')
<a href="{{ route('category.index') }}">
    Category
</a>
@endsection

@section('breadcrumb2')
<a href="{{ route('category.create') }}">
    أضافة فئة
</a>
@endsection

@section('content')

@if (Session::has('success'))
    <div class="alert alert-danger">
        {{ Session::get('success') }}
    </div>
@endif

<!-- Where Come From Validate If There Any Error -->
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

<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="form-group">

    <!-- Start Name -->
    <div class="form-group col-md-4">
        <label>أسم الفئة</label>
        <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="أدخل الأسم" name="category_name">
    </div>

    @error('category_name')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

</div>
    <!-- Start Type  -->
    <div class="form-group">
        <div class="form-input col-md-4">
            <label for="type">النوع</label>
            <select id="type" class="form-control @error('type') is-invalid @enderror" name="type">
                    <option value="parent">الاب</option>
                    <option value="child">أبن</option>
            </select>
        </div>


        @error('type')
        <p class="invalid-feedback">
            {{ $message }}
        </p>
        @enderror

    </div>

    <!-- Start salable  -->
    <div class="form-group">
        <div class="form-group col-md-4">
            <label for="salable">متاح للبيع</label>
            <select id="salable" class="form-control @error('salable') is-invalid @enderror" name="salable">
                    <option value="0">غير متاح</option>
                    <option value="1">متاح</option>
            </select>
        </div>


        @error('salable')
        <p class="invalid-feedback">
            {{ $message }}
        </p>
        @enderror

    </div>
<!-- Start Parent Name  -->
<div class="form-group">
    <!-- Country_name -->
    <div class="form-group col-md-4">
        <label for="parent_id">الفئة الأب</label>
        <select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
            @foreach ($parents as $parent)
            <option value="{{ $parent->id }}">{{ $parent->category_name }}</option>
            @endforeach
        </select>
    </div>


    @error('parent_id')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

</div>



<button type="submit" class="btn btn-success">أضافة</button>



</form>

@endsection
