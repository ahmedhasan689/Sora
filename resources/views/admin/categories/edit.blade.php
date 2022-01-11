@extends ('layouts.main')

@section('page_title', 'Add Category')

@section('title')
    <h3>
        تعديل فئة
    </h3>
@endsection

@section('breadcrumb')
    <a href="{{ route('category.index') }}">
        Category
    </a>
@endsection

@section('breadcrumb2')
    <a href="{{ route('category.create') }}">
        تعديل فئة
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

    <form action="{{ route('category.update', ['id' => $categories->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">

            <!-- Start Name -->
            <div class="form-group col-md-4">
                <label>أسم الفئة</label>
                <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="category_name" placeholder="أدخل الأسم" name="category_name" value="{{ $categories->category_name }}">
            </div>

            @error('category_name')
            <p class="invalid-feedback">
                {{ $message }}
            </p>
            @enderror

        </div>

        <button type="submit" class="btn btn-success">تعديل</button>

    </form>

@endsection