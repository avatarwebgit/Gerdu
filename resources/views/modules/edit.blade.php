@extends('layouts.app')

@section('content')
    <h1>ویرایش ماژول</h1>

    <form action="{{ route('modules.update', $module) }}" method="POST">
        @csrf
        @method('PUT')

        <label>نام:</label>
        <input type="text" name="name" value="{{ $module->name }}" required>
        @error('name')
        <div style="color:red;">{{ $message }}</div>
        @enderror

        <label>قیمت:</label>
        <input type="number" name="price" step="0.01" value="{{ $module->price }}" required>
        @error('price')
        <div style="color:red;">{{ $message }}</div>
        @enderror

        <label>فعال:</label>
        <input type="checkbox" name="is_active" value="1" {{ $module->is_active ? 'checked' : '' }}>

        <button type="submit">به‌روزرسانی</button>
    </form>
@endsection
