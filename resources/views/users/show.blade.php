@extends('layouts.app')

@section('title', 'جزئیات کاربر')

@section('header', 'جزئیات کاربر')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>اطلاعات کاربر {{ $user->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>نام:</strong> {{ $user->name }}</p>
            <p><strong>ایمیل:</strong> {{ $user->email }}</p>
            <p><strong>تلفن همراه:</strong> {{ $user->cellphone }}</p>
            <p><strong>آدرس:</strong> {{ $user->address }}</p>
            <p><strong>کد ملی:</strong> {{ $user->national_code }}</p>
            <p><strong>وضعیت:</strong> {{ ucfirst($user->status) }}</p>
            <p><strong>تاریخ ایجاد:</strong> {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
            <p><strong>آخرین به‌روزرسانی:</strong> {{ $user->updated_at->format('Y-m-d H:i:s') }}</p>
        </div>
        <div class="card-footer text-right">
            <a href="{{ route('users.index') }}" class="btn btn-secondary">بازگشت به لیست کاربران</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">ویرایش کاربر</a>
        </div>
    </div>
@endsection
