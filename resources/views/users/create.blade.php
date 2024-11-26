@extends('layouts.app')

@section('title', 'افزودن کاربر جدید')

@section('header', 'ایجاد کاربر جدید')

@section('content')
    <!-- نمایش ارورهای اعتبارسنجی -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">نام</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">ایمیل</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">کلمه عبور</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">تکرار کلمه عبور</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="cellphone" class="form-label">تلفن همراه</label>
            <input type="text" name="cellphone" id="cellphone" class="form-control" value="{{ old('cellphone') }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">آدرس</label>
            <textarea name="address" id="address" class="form-control" required>{{ old('address') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="national_code" class="form-label">کد ملی</label>
            <input type="text" name="national_code" id="national_code" class="form-control" value="{{ old('national_code') }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">وضعیت</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>فعال</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>غیرفعال</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">ایجاد کاربر</button>
    </form>
@endsection
