@extends ('layouts.main')

@section('page_title', 'Categories')

@section('title')
<h3 class="d-flex flex-column">
    <div>
        قائمة الفئات
    </div>
    <div class="mt-3 mb-6 flex-row-reverse">
        <a href="{{ route('category.trash') }}">
            <button class="btn btn-sm btn-warning">
                قائمة المحذوفات
            </button>
        </a>
    </div>
</h3>

@endsection

@section('breadcrumb')
<a href="{{ route('admin.index') }}">
    الفئات
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
            <td class="d-flex">
                <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="mr-2">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="far fa-edit"></i>
                        تعديل
                    </button>
                </a>

                <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="far fa-trash-alt"></i>
                        حذف
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
