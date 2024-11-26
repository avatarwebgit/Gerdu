@extends('layouts.app')

@section('title', 'ویرایش کاربر')

@section('header', 'ویرایش کاربر')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">نام</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">ایمیل</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">کلمه عبور</label>
            <input type="password" name="password" id="password" class="form-control">
            <small class="form-text text-muted">اگر قصد تغییر کلمه عبور را ندارید، این فیلد را خالی بگذارید.</small>
        </div>
        <div class="mb-3">
            <label for="cellphone" class="form-label">تلفن همراه</label>
            <input type="text" name="cellphone" id="cellphone" class="form-control" value="{{ old('cellphone', $user->cellphone) }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">آدرس</label>
            <textarea name="address" id="address" class="form-control" required>{{ old('address', $user->address) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="national_code" class="form-label">کد ملی</label>
            <input type="text" name="national_code" id="national_code" class="form-control" value="{{ old('national_code', $user->national_code) }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">وضعیت</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>فعال</option>
                <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>غیرفعال</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">به‌روزرسانی کاربر</button>
    </form>
@endsection
