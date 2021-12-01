@extends ('layouts.main')

@section('page_title', 'Users')

@section('title')
    <h3 class="d-flex flex-column">
        <div>
            قائمة المستخدمين
        </div>
        <div class="mt-3 mb-6 flex-row-reverse">
            <a href="{{ route('user.trash') }}">
                <button class="btn btn-sm btn-warning">
                    قائمة المحذوفات
                </button>
            </a>
        </div>
    </h3>

@endsection

@section('breadcrumb')
    <a href="{{ route('user.index') }}">
        Users
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
                    <img src="{{ asset('uploads/' . $user->avatar) }}" width="100" height="80">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->country->country_name }}</td>
                <td>{{ $user->subscriptions->name }}</td>
                <td class="d-flex">
                    <a href="{{ route('user.edit', $user->id) }}" class="mr-2">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="far fa-edit"></i>
                            تعديل
                        </button>
                    </a>

                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
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
