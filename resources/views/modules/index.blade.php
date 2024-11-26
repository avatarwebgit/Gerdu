@extends('layouts.app')

@section('content')
    <h1>ماژول‌ها</h1>
    <a href="{{ route('modules.create') }}">ایجاد ماژول جدید</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <ul>
        @foreach ($modules as $module)
            <li>
                <a href="{{ route('modules.show', $module) }}">{{ $module->name }}</a>
                <a href="{{ route('modules.edit', $module) }}">ویرایش</a>
                <form action="{{ route('modules.destroy', $module) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">حذف</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
