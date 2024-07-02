<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // membuat beberapa role
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);

        $studentRole = Role::create([
            'name' => 'student'
        ]);

        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);

        // membuat default user untuk super admin (akun super admin pertama penting harus dibuat)
        $userOwner = User::create([
            // sesuaikan dengan field yg ada di DB
            'name' => 'Addin Hadi Rizal',
            'occupation' => 'Software Engineer',
            'avatar' => 'images/default-avatar.png',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('owner')
        ]);

        $userTeacher = User::create([
            // sesuaikan dengan field yg ada di DB
            'name' => 'Ananta B P N',
            'occupation' => 'Software Engineer',
            'avatar' => 'images/default-avatar.png',
            'email' => 'teach@gmail.com',
            'password' => bcrypt('teach')
        ]);

        $userOwner->assignRole($ownerRole); // assign userOwner menjadi ownerRole
        $userTeacher->assignRole($teacherRole);

    }
}
