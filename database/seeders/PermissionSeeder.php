<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        foreach ($this->getTablesNames() as $tableName) {
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


    public function getTablesNames()
    {
        return [
            'التقارير',
            'المستخدمين',
           
            'المدن',
            'المخازن',
            'الصور',
            'الطلبات',
            'الصلاحيات',
            'العملاء',
            'فئات المنتجات',
            'المنتجات',
            'عناوين العملاء',
            'العناوين', 
        ];
    }


}
