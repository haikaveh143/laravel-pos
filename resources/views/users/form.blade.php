@extends('layouts.app')

@section('content')
    <h2>{{ $user->exists ? 'Edit User' : 'Create User' }}</h2>

    <form method="POST"
        enctype="multipart/form-data"
        action="{{ $user->exists
            ? route('users.update', $user)
            : route('users.store') }}">

        @csrf

        @if ($user->exists)
            @method('PUT')
        @endif

        <label>Username</label><br>
        <input type="text" name="username"
            value="{{ old('username', $user->username) }}">
        @error('username')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label>Full Name</label><br>
        <input type="text" name="full_name"
            value="{{ old('full_name', $user->full_name) }}">
        @error('full_name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        @if ($user->exists)
            <label>Profile Picture — image, maximum 2MB</label><br>
            <input type="file" name="avatar" accept="image/*">
            @error('avatar')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <br><br>
        @endif

        <button type="submit">Save User</button>
        <a href="{{ route('users') }}">Cancel</a>
    </form>
@endsection