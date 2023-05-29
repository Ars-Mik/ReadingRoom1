<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Администратор', 'Волонтёр', 'Пользователь'];

        foreach ($roles as $name) {
            UserRole::updateOrCreate(compact('name'));
        }
    }
}
