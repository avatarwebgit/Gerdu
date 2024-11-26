@extends('layouts.app')

@section('title', 'لیست کاربران')

@section('header', 'لیست کاربران')

@section('content')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">اضافه کردن کاربر</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>نام</th>
            <th>ایمیل</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->status) }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
