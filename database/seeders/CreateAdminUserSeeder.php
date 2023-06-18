<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
    {
        $this->call(PermissionSeeder::class);

        $superAdmin1 = User::updateOrCreate(
            [
                'email' => 'safa@yahoo.com',
            ],
            [
                'username' => ' safa ',
                'password' => bcrypt('123456'),
                'phone_number' => '888888888',
                'status' => "active",
            ]);


        $superAdminRole = Role::updateOrCreate(['name' => 'Owner'],
            [
                'guard_name' => 'web'
            ]);

        $allPermissions = Permission::all();

        $superAdminRole->syncPermissions($allPermissions);

        $superAdmin1->assignRole($superAdminRole);
        }
}

//php artisan db:seed --class=CreateAdminUserSeeder
