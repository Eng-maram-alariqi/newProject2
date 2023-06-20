<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints(); //

        Permission::truncate();

        Schema::enableForeignKeyConstraints();

        app()[PermissionRegistrar::class]->forgetCachedPermissions();


        $this->insertDataToPermissionTable();
        $this->createCustomPermissions();
        
    }

    public function insertDataToPermissionTable()
    {
        foreach ($this->initializedDataToInsertIntoPermissionTable() as $permissionName) {
            Permission::updateOrCreate(
                [
                    'name' => $permissionName,
                ],
                [
                    'guard_name' => 'web',
                ]);
        }

    }

    public function initializedDataToInsertIntoPermissionTable(): array
    {
        $data = [];
        foreach (getTablesName() as $tableName) {
            foreach ($this->getAllCrudOperations($tableName) as $action) {
                $data [] = $action;
            }
        }
        return $data;
    }

    public function getAllCrudOperations($tableName): array
    {
        $crudOperations = [];

        $permissions = ['عرض الكل', 'انشاء', 'اظهار', 'تحديث', 'حذف'];

        foreach ($permissions as $permission) {
            $crudOperations [] = $permission . '-' . $tableName;
        }
        return $crudOperations;
    }


    public function createCustomPermissions()
    {
        Permission::insertOrIgnore([
            ['name' => 'عرض الكل-لوحة_التحكم', 'guard_name' => 'web'],

        ]);
    }
}
