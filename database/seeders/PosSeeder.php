<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create([
            'full_name' => 'Juan Dela Cruz',
            'email' => 'juan@gmail.com',
            'phone' => '09123456789',
        ]);

        Customer::create([
            'full_name' => 'Maria Santos',
            'email' => 'maria@gmail.com',
            'phone' => '09234567890',
        ]);

        Customer::create([
            'full_name' => 'Pedro Reyes',
            'email' => 'pedro@gmail.com',
            'phone' => '09345678901',
        ]);

        Customer::create([
            'full_name' => 'Ana Garcia',
            'email' => 'ana@gmail.com',
            'phone' => '09456789012',
        ]);

        Customer::create([
            'full_name' => 'Mark Lopez',
            'email' => 'mark@gmail.com',
            'phone' => '09567890123',
        ]);

        User::create(['username' => 'jdelacruz', 'full_name' => 'Juan Dela Cruz']);
        User::create(['username' => 'msantos', 'full_name' => 'Maria Santos']);
        User::create(['username' => 'preyes', 'full_name' => 'Pedro Reyes']);
        User::create(['username' => 'agarcia', 'full_name' => 'Ana Garcia']);
        User::create(['username' => 'mlopez', 'full_name' => 'Mark Lopez']);
    }
}