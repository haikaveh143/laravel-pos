<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function create()
    {
        return view('users.form', [
            'user' => new User(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'unique:users,username'],
            'full_name' => ['required'],
        ]);

        User::create($validated);

        return redirect()->route('users')
            ->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => ['required'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);

        unset($validated['avatar']);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $avatarPath = 'avatars/' . Str::uuid() . '.jpg';

            $manager = new ImageManager(new Driver());

            $image = $manager
                ->read($request->file('avatar')->getPathname())
                ->cover(200, 200);

            Storage::disk('public')->put(
                $avatarPath,
                (string) $image->toJpeg(quality: 85)
            );

            $validated['avatar'] = $avatarPath;
        }

        $user->update($validated);

        return redirect()->route('users')
            ->with('success', 'User updated successfully.');
    }
}