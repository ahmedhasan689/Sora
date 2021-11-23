@extends ('layouts.main')


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
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">الأسم</th>
            <th scope="col">الايميل</th>
            <th scope="col">العنوان</th>
            <th scope="col">نوع الاشتراك</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ Str::limit($user->address, '20') }}</td>
            <td>{{ $user->subscriptions->name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection