<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator'
        ]);
        $user = Role::create([
            'name' => 'user',
            'display_name' => 'User'
        ]);
        $superadmin = Role::create([
            'name' => 'superadmin',
            'display_name' => 'Super Administrator'
        ]);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('12345678');
        $admin->save();

        $petugas = new User();
        $petugas->name = 'User';
        $petugas->email = 'user@gmail.com';
        $petugas->password = Hash::make('12345678');
        $petugas->save();

        $superadmin = new User();
        $superadmin->name = 'Super Admin';
        $superadmin->email = 'superadmin@gmail.com';
        $superadmin->password = Hash::make('12345678');
        $superadmin->save();

        $admin->attachRole($admin);
        $petugas->attachRole($petugas);
        $superadmin->attachRole($superadmin);
    }
}
