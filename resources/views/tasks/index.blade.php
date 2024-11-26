@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">لیست تسک‌ها</h1>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">ایجاد تسک جدید</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>عنوان</th>
                    <th>توضیحات</th>
                    <th>وضعیت</th>
                    <th>اقدامات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>
                            <a href="{{route('tasks.show',['task'=>$task->id])}}">
                                {{ $task->title }}
                            </a>


                        </td>
                        <td>{{ Str::limit($task->description, 50) }}</td>
                        <td>
                            <span class="badge
                            @if($task->status == 'pending') badge-warning
                            @elseif($task->status == 'in-progress') badge-primary
                            @else badge-success
                            @endif">
                            {{ $task->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
