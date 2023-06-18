@php use App\Enums\ProductUnitEnum; @endphp
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddStoreProduct" aria-labelledby="offcanvasAddProductLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddProductLabel" class="offcanvas-title">إضافة منتج للمخزن</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="addStoreProductForm" onsubmit="return false" method="post">
            <div class="mb-3">
                <label class="form-label" for="batch_number">رقم الدفعة</label>
                <input type="number" class="form-control" id="batch_number" name="batch_number" />
            </div>
            <div class="mb-3" id="add-product-parent">
                <label class="form-label" for="product">المنتج</label>
                <select id="product" class=" form-select form-control" name="product_id"></select>
                <label id="category-error" class="error" for="product"></label>
            </div>
            <div class="mb-3">
                <label for="unit" class="form-label">الوحدة</label>
                <select id="unit" class="select form-select form-select" data-allow-clear="true" name="unit">
                    @foreach(ProductUnitEnum::cases() as $value => $label)
                    <option value="{{ $label }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="purchasing_price">سعر شراء الوحدة</label>
                <input type="number" class="form-control" id="purchasing_price" name="purchasing_price" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="unit_price">سعر بيع الوحدة</label>
                <input type="number" class="form-control" id="unit_price" name="unit_price" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="production_date">تاريخ الانتاج</label>
                <input type="date" class="form-control" id="production_date" name="production_date" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="expiry_date">تاريخ الانتهاء</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="quantity">الكمية</label>
                <input type="number" class="form-control" id="quantity" name="quantity" />
            </div>

            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">حفظ</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>