@extends ('layouts.main')

@section('page_title', 'Trashed Sub-Admins')

@section('title')
    <h3>
        قائمة المشرفين المحذوفين
        <div class="d-flex mt-3">
            <form action="{{ route('subadmin.restore')}}" method="POST" class="mx-1">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-sm btn-warning">أستعادة الكل</button>
            </form>
            <form action="{{ route('subadmin.force-delete')}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">حذف الكل</button>
            </form>
        </div>
    </h3>

@endsection

@section('breadcrumb')
    <a href="{{ route('subadmin.index') }}">
        Sub-Admin
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
        @foreach ($sub_admins as $sub_admin)
            <tr>
                <th scope="row">{{ $sub_admin->id }}</th>
                <td>
                    <img src="{{ asset('uploads/' . $sub_admin->avatar) }}" width="100" height="80">
                </td>
                <td>{{ $sub_admin->name }}</td>
                <td>{{ $sub_admin->phone_number }}</td>
                <td>{{ $sub_admin->email }}</td>
                <td>{{ $sub_admin->country->country_name }}</td>
                <td>{{ $sub_admin->subscriptions->name }}</td>
                <td class="d-flex">
                    <form action="{{ route('subadmin.restore', $sub_admin->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-sm btn-warning">أستعادة</button>
                    </form>

                    <form action="{{ route('subadmin.force-delete', $sub_admin->id )}}" method="POST" class="mr-3">
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
