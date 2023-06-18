<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddProduct" aria-labelledby="offcanvasAddProductLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasAddProductLabel" class="offcanvas-title">إضافة منتج جديد</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="addNewProductForm" onsubmit="return false" method="post">
            <div class="mb-3">
                <label class="form-label" for="add-product-name">اسم المنتج</label>
                <input type="text" class="form-control" id="add-product-name" name="name"/>
            </div>
            <div class="mb-3" id="add-product-category-parent">
                <label class="form-label" for="category">الأصناف</label>
                <select id="category" class=" form-select form-control" name="product_category_id"></select>
                <label id="category-error" class="error" for="category"></label>
            </div>

            <div class="mb-3">
                <label class="form-label" for="product_image">الصورة</label>
                <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*"/>
            </div>

            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">حفظ</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>
