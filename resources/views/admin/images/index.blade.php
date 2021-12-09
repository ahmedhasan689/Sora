@extends('layouts.main')

@section('page_title', 'Images')

@section('title')
<h3 class="d-flex flex-column">
    <div>
        الصور
    </div>
    <div class="mt-3 mb-6 flex-row-reverse">
        <a href="{{ route('image.trash') }}">
            <button class="btn btn-sm btn-warning">
                قائمة المحذوفات
            </button>
        </a>
    </div>
</h3>

@endsection

@section('breadcrumb')
<a href="{{ route('image.index') }}">
    الصور
</a>
@endsection

@section('content')

@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif


<div class="d-flex">
    <div class="row">
        @foreach($images as $image)
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('uploads') . '/' . $image->image_path }}" class="card-img-top border border-white" width="185" height="188">
                <div class="card-body">
                    <h5 class="card-title" style="float: right;">
                        {{ $image->name }}
                    </h5>
                </div>
                <p class="card-text mr-2">
                    {{ $image->description }}
                </p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">أسم المستخدم : {{ $image->user->name }}</li>
                    <li class="list-group-item">الفئة : {{ $image->category->category_name }}</li>
                </ul>
                <div class="card-body">
                    <div class="d-flex">
                        <a href="{{ route('image.edit', ['id' => $image->id]) }}" class="card-link">
                            <button class="btn btn-sm btn-success">
                                <i class="far fa-edit"></i>
                                تعديل
                            </button>
                        </a>
                        <form action="{{ route('image.delete', ['id' => $image->id]) }}" method="POST" class="mr-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="far fa-trash-alt"></i>
                                حذف
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div>
    {{ $images->links() }}
</div>

@endsection