@extends('layouts.app')

@section('content')
    <h2>{{ $customer->exists ? 'Edit Customer' : 'Create Customer' }}</h2>

    <form method="POST"
        action="{{ $customer->exists
            ? route('customers.update', $customer)
            : route('customers.store') }}">

        @csrf

        @if ($customer->exists)
            @method('PUT')
        @endif

        <label>Full Name</label><br>
        <input type="text" name="full_name"
            value="{{ old('full_name', $customer->full_name) }}">
        @error('full_name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label>Email</label><br>
        <input type="email" name="email"
            value="{{ old('email', $customer->email) }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <label>Phone</label><br>
        <input type="text" name="phone"
            value="{{ old('phone', $customer->phone) }}">
        <br><br>

        <button type="submit">Save Customer</button>
        <a href="{{ route('customers') }}">Cancel</a>
    </form>
@endsection