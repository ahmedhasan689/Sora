@extends('layouts.main')

@section('page_title', 'Trashed Images')

@section('title')
<h3 class="d-flex flex-column">
        الصور المحذوفة
    <div class="d-flex mt-3">
        <form action="{{ route('image.restore') }}" method="post" class="mx-1">
            @csrf
            @method('PUT')
            <button class="btn btn-sm btn-outline-warning">
                <i class="far fa-trash-alt"></i>
                أستعادة الكل
            </button>
        </form>
        <form action="{{ route('image.force-delete') }}" method="post">
            @csrf
            @method('Delete')
            <button class="btn btn-sm btn-outline-danger">
                <i class="far fa-trash-alt"></i>
                حذف الكل
            </button>
        </form>
    </div>
</h3>

@endsection

@section('breadcrumb')
<a href="{{ route('image.index') }}">
    الصور المحذوفة
</a>
@endsection

@section('content')

@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif


<div>
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
                        <form action="{{ route('image.restore', ['id' => $image->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-sm btn-danger">
                                <i class="far fa-trash-alt"></i>
                                أستعادة
                            </button>
                        </form>
                        <form action="{{ route('image.force-delete', ['id' => $image->id]) }}" method="post" class="mr-2">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn-danger">
                                <i class="far fa-trash-alt"></i>
                                حذف نهائي
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection