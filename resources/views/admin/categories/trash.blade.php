@extends ('layouts.main')

@section('page_title', 'Categories')

@section('title')
<h3 class="d-flex flex-column">
    قائمة الفئات المحذوفة

    <div class="d-flex mt-3">
        <form action="{{ route('category.restore')}}" method="POST" class="mx-1">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-sm btn-outline-warning">أستعادة الكل</button>
        </form>
        <form action="{{ route('category.force-delete')}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">حذف الكل</button>
        </form>
    </div>
</h3>

@endsection

@section('breadcrumb')
<a href="{{ route('category.index') }}">
    الفئات
</a>
@endsection

@section('breadcrumb2')
<a href="{{ route('category.trash') }}">
    المحذوفات
</a>
@endsection


@section('content')

<!-- Read Flash MSG -->
@if (Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif




<table class="table table-striped">
    <thead class="table-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">أسم الفئة</th>
            <th scope="col">خيارات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->category_name }}</td>
            <td>{{ $category->deleted_at }}</td>
            <td class="d-flex">
                <form action="{{ route('category.restore', ['id' => $category->id]) }}" method="POST" class="mr-2">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fas fa-trash-restore"></i>
                        أستعادة
                    </button>
                </form>

                <form action="{{ route('category.force-delete', ['id' => $category->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="far fa-trash-alt"></i>
                        حذف نهائي
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection