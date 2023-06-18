<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditProduct" aria-labelledby="offcanvasEditProductLabel">
    <div class="offcanvas-header border-bottom">
        <h6 id="offcanvasEditProductLabel" class="offcanvas-title">تعديل المنتج</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form class="pt-0" id="editProductForm" onsubmit="return false" enctype="multipart/form-data" method="post">
            {{ method_field('PUT') }}

            <input type="hidden" id="productId" name="id"/>
            <div class="mb-3">
                <label class="form-label" for="productName">اسم المنتج</label>
                <input type="text" class="form-control" id="productName" name="name"/>
            </div>
            <div class="mb-3" id="edit-product-category-parent">
                <label class="form-label" for="productCategory">الأصناف</label>
                <select id="productCategory" class="select2 form-select" name="product_category_id"></select>
            </div>

            <div class="mb-3">
                <label class="form-label" for="productImage">الصورة</label>
                <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*"/>
            </div>

            <button type="submit" class="btn btn-primary data-submit me-1 me-sm-3">تعديل</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">إغلاق</button>
        </form>
    </div>
</div>
