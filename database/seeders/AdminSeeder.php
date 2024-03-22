<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            ['name'=>'Administrador',
            'last_name'=>'Admin',
            'second_last_name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin'),
            'role_id'=>1,
            ]
        );
    }
}
