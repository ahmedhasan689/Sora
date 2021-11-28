@extends ('layouts.main')

@section('page_title', 'Admins')

@section('title')
<h3>
    قائمة المشرفين المحذوفين
    <div class="d-flex mt-3">
        <form action="{{ route('admin.restore')}}" method="POST" class="mx-1">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-sm btn-warning">أستعادة الكل</button>
        </form>
        <form action="{{ route('admin.force-delete')}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">حذف الكل</button>
        </form>
    </div>
</h3>

@endsection

@section('breadcrumb')
<a href="{{ route('admin.index') }}">
    Admin
</a>
@endsection


@section('content')

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
                <img src="{{ asset('uploads/' . $user->avatar) }}" width="100" height="80">
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->country->country_name }}</td>
            <td>{{ $user->subscriptions->name }}</td>
            <td class="d-flex">
                <form action="{{ route('admin.restore', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-sm btn-warning">أستعادة</button>
                </form>

                <form action="{{ route('admin.force-delete', $user->id )}}" method="POST" class="mr-3">
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