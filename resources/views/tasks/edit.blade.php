@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">ویرایش تسک</h1>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">عنوان تسک</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">توضیحات</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">وضعیت</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pending" @if($task->status == 'pending') selected @endif>در انتظار</option>
                    <option value="in-progress" @if($task->status == 'in-progress') selected @endif>در حال انجام</option>
                    <option value="completed" @if($task->status == 'completed') selected @endif>اتمام شده</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="module_id" class="form-label">ماژول</label>
                <select class="form-select" id="module_id" name="module_id" required>
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}" @if($task->module_id == $module->id) selected @endif>{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">بروزرسانی تسک</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">بازگشت</a>
        </form>
    </div>
@endsection
