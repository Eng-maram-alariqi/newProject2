<ul class="menu-sub">
    <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="menu-item <?php echo e($submenu->slug === Route::currentRouteName() ? 'active open' : ''); ?>">
            <a href="<?php echo e($submenu->url); ?>" class="menu-link">
                <div><?php echo e($submenu->name); ?></div>
            </a>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH E:\am\newProject2\resources\views/panels/sidebar-submenu.blade.php ENDPATH**/ ?>