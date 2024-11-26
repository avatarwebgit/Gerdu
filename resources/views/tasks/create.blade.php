@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">ایجاد تسک جدید</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">عنوان تسک</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">توضیحات</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">وضعیت</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pending">در انتظار</option>
                    <option value="in-progress">در حال انجام</option>
                    <option value="completed">اتمام شده</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="module_id" class="form-label">ماژول</label>
                <select class="form-select" id="module_id" name="module_id" required>
                    <option value="">انتخاب ماژول</option>
                    <!-- فرض بر این است که لیستی از ماژول‌ها به view ارسال می‌شود -->
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">ایجاد تسک</button>
            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">بازگشت</a>
        </form>
    </div>
@endsection
