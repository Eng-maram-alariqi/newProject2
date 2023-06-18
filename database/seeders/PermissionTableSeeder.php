<?php
namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\PermissionTableSeeder;

class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
// public function run()
// {
// $permissions = [
//     'الفواتير',
//     'قائمة الفواتير',
//     'الفواتير المدفوعة',
//     'الفواتير المدفوعة جزئيا',
//     'الفواتير الغير مدفوعة',
//     'ارشيف الفواتير',
//     'التقارير',
//     'تقرير الفواتير',
//     'تقرير العملاء',
//     'المستخدمين',
//     'قائمة المستخدمين',
//     'صلاحيات المستخدمين',
//     'الاعدادات',
//     'المنتجات',
//     'الاقسام',
//     'العروض',
//     'قائمة العروض',


//     'اضافة فاتورة',
//     'حذف الفاتورة',
//     'تصدير EXCEL',
//     'تغير حالة الدفع',
//     'تعديل الفاتورة',
//     'ارشفة الفاتورة',
//     'طباعةالفاتورة',
//     'اضافة مرفق',
//     'حذف المرفق',

//     'اضافة مستخدم',
//     'تعديل مستخدم',
//     'حذف مستخدم',

//     'عرض صلاحية',
//     'اضافة صلاحية',
//     'تعديل صلاحية',
//     'حذف صلاحية',

//     'اضافة منتج',
//     'تعديل منتج',
//     'حذف منتج',

//     'اضافة قسم',
//     'تعديل قسم',
//     'حذف قسم',
//     'الاشعارات',

// ];
// foreach ($permissions as $permission) {
// Permission::create(['name' => $permission]);
// }
// }


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
        dd($permission);
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

    $permissions = ['list', 'create', 'show', 'update', 'delete'];

    foreach ($permissions as $permission) {
        $crudOperations [] = $permission . '-' . $tableName;
    }
    return $crudOperations;
}


}