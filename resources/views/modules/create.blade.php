@extends('layouts.app')

@section('content')
    <h1>ایجاد ماژول</h1>

    <form action="{{ route('modules.store') }}" method="POST">
        @csrf
        <label>نام:</label>
        <input type="text" name="name" required>
        @error('name')
        <div style="color:red;">{{ $message }}</div>
        @enderror

        <label>قیمت:</label>
        <input type="number" name="price" step="0.01" required>
        @error('price')
        <div style="color:red;">{{ $message }}</div>
        @enderror

        <label>فعال:</label>
        <input type="checkbox" name="is_active" value="1" checked>

        <button type="submit">ایجاد</button>
    </form>
@endsection
