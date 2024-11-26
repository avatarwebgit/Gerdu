<!-- resources/views/tasks/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">جزئیات تسک</h1>

        <div class="card">
            <div class="card-header">
                <h3>{{ $task->title }}</h3>
            </div>
            <div class="card-body">
                <p><strong>توضیحات:</strong> {{ $task->description ?? 'ندارد' }}</p>
                <p><strong>وضعیت:</strong>
                    <span class="badge
                    @if($task->status == 'pending') badge-warning
                    @elseif($task->status == 'in-progress') badge-primary
                    @else badge-success
                    @endif">
                    {{ ucfirst($task->status) }}
                </span>
                </p>

                <!-- نمایش ماژول مرتبط با تسک -->
                <p><strong>ماژول:</strong> {{ $task->module->name }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">بازگشت به لیست تسک‌ها</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">ویرایش</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
@endsection
