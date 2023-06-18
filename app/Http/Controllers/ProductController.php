<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;
use function Psy\debug;

class ProductController extends Controller
{

    public function __construct(public ProductService $productService)
    {

    }
    public function index(Request $request)
    {
        $model = Product::orderBy('id','DESC')->with('productCategory');

        return DataTables::of($model)
            ->editColumn('image', function($product) {
                return $product->getFirstMediaUrl();
            })
            ->toJson();
    }

    public function store(StoreProductRequest $request)
    {
        $product= $this->productService->create($request->validated());
        return $product;
    }

    public function show(Product $product)
    {
        return ProductResource::make($product->load('productCategory'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {

        $product= $this->productService->update($request->validated(),$product);
        return $product;
    }

    public function changeStatus(Product $product)
    {
        $product->changeStatus();
        return response()->noContent();
    }
}
