@extends ('layouts.main')

@section('page_title', 'Admins')

@section('title')
<h3>
    قائمة المشرفين
</h3>

@endsection

@section('breadcrumb')
<a href="{{ route('admin.index') }}">
    Admin
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
            <th scope="col">الصورة الشخصية</th>
            <th scope="col">الأسم</th>
            <th scope="col">رقم الجوال</th>
            <th scope="col">الايميل</th>
            <th scope="col">الدولة</th>
            <th scope="col">نوع الاشتراك</th>
            <th scope="col">خيارات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>
                <img src="{{ $user->avatar }}" width="100" height="80"/>
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->country->country_name }}</td>
            <td>{{ $user->subscriptions->name }}</td>
            <td class="d-flex">
                <a href="#" class="mr-2">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="far fa-edit"></i>
                        تعديل
                    </button>
                </a>

                <form action="#" method="POST">
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