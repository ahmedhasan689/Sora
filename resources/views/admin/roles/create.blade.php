@extends ('layouts.main')

@section('page_title', 'Add Roles')

@section('title')
    <h3>
        أضافة صلاحية
    </h3>
@endsection

@section('breadcrumb')
    <a href="{{ route('role.index') }}">
        Roles
    </a>
@endsection

@section('breadcrumb2')
    <a href="{{ route('role.create') }}">
         Add Roles
    </a>
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

    <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-row">

            <!-- Start Name -->
            <div class="form-group col-md-4">
                <label>الأسم</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="أدخل الأسم" name="name">
            </div>

            @error('name')
            <p class="invalid-feedback">
                {{ $message }}
            </p>
            @enderror

        </div>

        <div class="form-group">

            @foreach(config('abilities') as $ability => $value)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="abilities[]" value="{{ $ability }}" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        {{ $value }}
                    </label>
                </div>
            @endforeach

        </div>

        <div>
            <button class="btn btn-success">حفظ</button>
        </div>





    </form>

@endsection
