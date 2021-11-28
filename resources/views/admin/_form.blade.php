<input type="hidden" value="2" name="admin">

<div class="form-row">

    <!-- Start Name -->
    <div class="form-group col-md-4">
        <label>الأسم</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="أدخل الأسم" name="name" value="{{ old('name', $admin->name) }}">
    </div>

    @error('name')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

</div>

<div class="form-row">

    <!-- Start Number Phone -->
    <div class="form-group col-md-6">
        <label>رقم الجوال</label>
        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" placeholder="أدخل رقم الجوال"
        value="{{ old('phone_number', $admin->phone_number) }}">
    </div>

    @error('phone_number')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

    <!-- Start Email -->
    <div class="form-group col-md-6">
        <label>الايميل</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email" name="email" placeholder="أدخل الايميل"
        value="{{ old('email', $admin->email) }}">
    </div>

    @error('email')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

</div>

<!-- Start Password -->
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputEmail4">كلمة المرور</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="أدخل كلمة المرور">
    </div>

    @error('password')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

    <div class="form-group col-md-6">
        <label for="inputPassword4">إعادة كلمة المرور</label>
        <input type="password" class="form-control @error('re-password') is-invalid @enderror" id="repeat-password" name="re-password" placeholder="أعد كتابة كلة المرور">
    </div>

    @error('re-password')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror
</div>

<!-- Start Address  -->
<div class="form-row">
    <!-- Country_name -->
    <div class="form-group col-md-4">
        <label for="inputState">الدولة</label>
        <select id="inputState" class="form-control @error('country') is-invalid @enderror" name="country">
            @foreach ($countries as $country)
            <option
              <?php if ($admin->country->id == $country->id ) {
                  echo 'selected';
              } ?>
              >{{ $country->country_name }}</option>
            @endforeach
        </select>
    </div>


    @error('country')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

    <!-- City -->
    <div class="form-group col-md-6">
        <label for="inputCity">المدينة</label>
        <input type="text" class="form-control @error('city') is-invalid @enderror" id="inputCity" name="city"
        value="{{ old('city', $admin->country->city) }}">
    </div>

    @error('city')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

    <!-- Zip-code -->
    <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="inputZip" name="zip_code" value="{{  odld('zip_code', $admin->country->zip_code) }}">
    </div>

    @error('zip_code')
    <p class="invalid-feedback">
        {{ $message }}
    </p>
    @enderror

</div>

<!-- Avatar -->
<div class="input-group mb-3">
    <label class="input-group">صورة</label>
    <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar">
</div>

@error('avatar')
<p class="invalid-feedback">
    {{ $message }}
</p>
@enderror

<button type="submit" class="btn btn-success">{{ $button }}</button>
