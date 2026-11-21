<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrNew([
            'email' => 'admin@temu.com',
        ]);

        $admin->name = 'Administrator TEMU';
        $admin->password = Hash::make('AdminTemu123!');
        $admin->role = 'admin';
        $admin->save();
    }
}
