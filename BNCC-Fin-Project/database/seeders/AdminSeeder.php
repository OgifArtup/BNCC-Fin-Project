<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'nama' => 'admin1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1'),
            'nomor' => '081233334444',
            'roles' => 'admin',
            'id_admin' => 'admin001',
        ]);

        $admin = User::create([
            'nama' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin2'),
            'nomor' => '081233334444',
            'roles' => 'admin',
            'id_admin' => 'admin002',
        ]);

        $admin = User::create([
            'nama' => 'admin3',
            'email' => 'admin3@gmail.com',
            'password' => Hash::make('admin3'),
            'nomor' => '081233334444',
            'roles' => 'admin',
            'id_admin' => 'admin003',
        ]);
    }
}
