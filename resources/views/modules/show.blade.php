@extends('layouts.app')

@section('content')
    <h1>جزئیات ماژول: {{ $module->name }}</h1>

    <p><strong>قیمت:</strong> {{ $module->price }}</p>
    <p><strong>فعال:</strong> {{ $module->is_active ? 'بله' : 'خیر' }}</p>
    <h2>تسک‌ها:</h2>
    <ul>
        @foreach ($module->tasks as $task)
            <li>
                <a href="{{ route('modules.tasks.show', [$module, $task]) }}">{{ $task->title }}</a>
                <a href="{{ route('modules.tasks.edit', [$module, $task]) }}">ویرایش</a>
                <form action="{{ route('modules.tasks.destroy', [$module, $task]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">حذف</button>
                </form>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('modules.tasks.create', $module) }}">ایجاد تسک جدید</a>
    <a href="{{ route('modules.index') }}">بازگشت به ماژول‌ها</a>
@endsection
