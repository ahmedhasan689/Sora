@extends ('layouts.main')

@section('page_title', 'Edit Image')

@section('title')
<h3>
    تعديل فئة
</h3>
@endsection

@section('breadcrumb')
<a href="{{ route('image.index') }}">
    Image
</a>
@endsection

@section('breadcrumb2')
<a href="{{ route('image.create') }}">
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

<form action="{{ route('image.update', ['id' => $images->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">

        <!-- Start Name -->
        <div class="form-group col-md-4">
            <label>العنوان</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="أدخل الأسم" name="name" value="{{ $images->name }}">
        </div>

        @error('name')
        <p class="invalid-feedback">
            {{ $message }}
        </p>
        @enderror

    </div>

    <div class="form-floating">
        <label for="description">description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" style="height: 100px" name="description" value="{{ $images->description }}">{{ $images->description }}</textarea>

        @error('description')
        <p class="invalid-feedback">
            {{ $message }}
        </p>
        @enderror

    </div>

    <div class="form-group mt-3">

        <!-- Start Name -->
        <div class="form-group col-md-4">
            <label>أسم الفئة</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}"
                    <?php if ($images->category->id == $category->id){
                        echo 'selected';
                    }?>
                >
                {{ $category->category_name }}</option>
                @endforeach
                
            </select>
        </div>

        @error('image_name')
        <p class="invalid-feedback">
            {{ $message }}
        </p>
        @enderror

    </div>




    <div class="custom-file">
        <input type="file" class="custom-file-input @error('image_path') is-invalid @enderror" id="image_path" name="image_path">
        <label class="custom-file-label" for="image_path" value="{{ $images->image_path }}">{{ $images->image_path }}</label>

        @error('image_path')
        <p class="invalid-feedback">
            {{ $message }}
        </p>
        @enderror
    </div>





    <button type="submit" class="btn btn-success mt-3">تعديل</button>



</form>

@endsection