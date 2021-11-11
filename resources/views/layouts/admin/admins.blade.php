@extends ('layouts.admin.main')

@section('content')

<form>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">أسم المشرف</span>
        </div>
        <input type="name" class="form-control" name="name" id="name" placeholder="أدخل أسم المشرف" autocomplete="off">
        
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Parent Name</span>
    </div>
    <select class="form-control" id="Parent" placeholder="Select Parent Name" name="parent_id">
        <option>No Parent</option>
        <option>No Parent</option>
        <option>No Parent</option>
    </select>
</div>
</form>

@endsection