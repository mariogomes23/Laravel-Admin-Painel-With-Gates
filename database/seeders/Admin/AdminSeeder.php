<?php

namespace Database\Seeders\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $userRole = Role::create(['name'=>'user']);
        $adminRole = Role::create(['name'=>'admin']);

        User::create([
            'name'=>'Admin',
            'email'=>'admin@admin',
            'password'=>Hash::make('12345678'),
            'role_id'=>$adminRole->id,
            'email_verified_at'=>now()


        ]);
    }
}
