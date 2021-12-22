@extends ('layouts.main')

@section('page_title', 'Edit Roles')

@section('title')
    <h3>
        تعديل مستخدم
    </h3>
@endsection

@section('breadcrumb')
    <a href="{{ route('role.index') }}">
        Roles
    </a>
@endsection

@section('breadcrumb2')
{{--    <a href="{{ route('role.edit', ['id' => $role->$role]) }}">--}}
{{--        Edit role--}}
{{--    </a>--}}
@endsection

@section('content')

    @if (Session::has('success'))
        <div class="alert alert-danger">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Where Come From Validate If There Any Error -->
    @if ($errors->any())

        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $message)
                    <li>
                        {{ $message }}
                    </li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{ route('role.update', ['id' => $role->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-row">

            <!-- Start Name -->
            <div class="form-group col-md-4">
                <label>الأسم</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="أدخل الأسم" name="name" value="{{ $role->name }}">
            </div>

            @error('name')
            <p class="invalid-feedback">
                {{ $message }}
            </p>
            @enderror

        </div>

        <div class="form-group">

            @foreach( config('abilities') as $ability => $value)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $ability }}"
                    <?php 
                        if (in_array($ability, $role->abilities ?? [])) {
                            echo 'checked';
                        }
                    ?> 
                    >
                    <label class="form-check-label">
                        {{ $value }}
                    </label>
                </div>
            @endforeach




        </div>
        <button class="btn btn-success">
            تعديل
        </button>


    </form>

@endsection
