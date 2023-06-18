<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Yajra\DataTables\DataTables;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $model = ProductCategory::query();
        return DataTables::of($model)->toJson();
    }

    public function store(StoreProductCategoryRequest $request)
    {

    }

    public function show(ProductCategory $productCategory)
    {

    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        //
    }

    public function destroy(ProductCategory $productCategory)
    {
        //
    }
}
