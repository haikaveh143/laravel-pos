<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            ['username' => 'jdelacruz', 'full_name' => 'Juan Dela Cruz'],
            ['username' => 'msantos', 'full_name' => 'Maria Santos'],
            ['username' => 'preyes', 'full_name' => 'Pedro Reyes'],
            ['username' => 'agarcia', 'full_name' => 'Ana Garcia'],
            ['username' => 'mlopez', 'full_name' => 'Mark Lopez'],
        ];

        return view('users', compact('users'));
    }
}
