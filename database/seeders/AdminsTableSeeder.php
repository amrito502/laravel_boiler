<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            'id' => 1,
            'name' => 'Super Admin',
            'type' => 'superadmin',
            'vendor_id' => '0',
            'password' => Hash::make('1234'),
            'mobile' => '01933456786',
            'image' => '',
            'email' => 'admin@gmail.com',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        Admin::insert($data);
    }
}
