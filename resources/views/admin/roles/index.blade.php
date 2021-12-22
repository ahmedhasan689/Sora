@extends ('layouts.main')

@section('page_title', 'Roles')

@section('title')
    <h3 class="d-flex flex-column">
        <div>
            قائمة الصلاحيات
        </div>
        <div class="mt-3 mb-6 flex-row-reverse">
            <a href="{{ route('role.create') }}">
                <button class="btn btn-sm btn-primary">
                    انشاء صلاحية
                </button>
            </a>
        </div>
    </h3>

@endsection

@section('breadcrumb')
    <a href="{{ route('role.index') }}">
        Roles
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
            <th scope="col">الاسم</th>
            <th scope="col">Users #</th>
            <th scope="col">خيارات</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($roles as $role)
            <tr>
                <th scope="row">{{ $role->id }}</th>
                <th scope="row">{{ $role->name }}</th>
                <td>{{ $role->users_count }}</td>
                <td class="d-flex">
                    <a href="{{ route('role.edit', $role->id) }}" class="mr-2">
                        <button type="submit" class="btn btn-sm btn-success">
                            <i class="far fa-edit"></i>
                            تعديل
                        </button>
                    </a>
                    <form action="{{ route('role.delete', $role->id) }}" method="POST">
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
