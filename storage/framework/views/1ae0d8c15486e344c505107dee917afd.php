<?php $__env->startSection('content'); ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4"><span class="text-muted fw-light">المنتجات /</span> إدارة المنتجات
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <table id="productDatatable" class="datatables-basic table table-bordered">
                        <thead>
                        <tr>
                            <th>الرقم</th>
                            <th>المنتج</th>
                            <th>الصنف</th>
                            <th>التاريخ</th>
                            <th>الصورة</th>
                            <th>الإجراءات</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <!-- BEGIN: Modal-->
            <?php echo $__env->make('products.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('products.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('products.stop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- END: Modal-->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
        <?php $__env->startPush('scripts'); ?>
            <script src="<?php echo e(asset('js/products.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\am\newProject2\resources\views/products/view.blade.php ENDPATH**/ ?>