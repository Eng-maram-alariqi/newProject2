<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

if (!function_exists('getTablesName')) {
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
