<?php $__env->startSection('css'); ?>
<!--Internal  Font Awesome -->
<link href="<?php echo e(URL::asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
<!--Internal  treeview -->
<link href="<?php echo e(URL::asset('assets/plugins/treeview/treeview-rtl.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->startSection('title'); ?>
تعديل الصلاحيات - مورا سوفت للادارة القانونية
<?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">الصلاحيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
                الصلاحيات</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(count($errors) > 0): ?>
<div class="alert alert-danger">
    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>خطا</strong>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>


<?php echo Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]); ?>

<!-- row -->
<div class="row">
    <div class="col-md-12">
        <div class="card mg-b-20">
            <div class="card-body">
                <div class="main-content-label mg-b-5">
                    <div class="form-group">
                        <p>اسم الصلاحية :</p>
                        <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                    </div>
                </div>
                <div class="row">
                    <!-- col -->
                    <div class="col-lg-4">
                        <ul id="treeview1">
                            <li><a href="#">الصلاحيات</a>
                                <ul>
                                    <li>
                                        <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label><?php echo e(Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name'))); ?>

                                            <?php echo e($value->name); ?></label>
                                        <br />
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-main-primary">تحديث</button>
                    </div>
                    <!-- /col -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<!-- Internal Treeview js -->
<script src="<?php echo e(URL::asset('assets/plugins/treeview/treeview.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.contentLayoutMaster', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\am\newProject2\resources\views/roles/edit.blade.php ENDPATH**/ ?>