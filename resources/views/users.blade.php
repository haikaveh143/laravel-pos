@extends('layouts.app')

@section('content')
    <h2>User Accounts</h2>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['username'] }}</td>
                    <td>{{ $user['full_name'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
