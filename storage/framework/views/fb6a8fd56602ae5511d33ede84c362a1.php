<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Sản phẩm</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Tất cả sản phẩm</h4>
                <div class="card-header-action">
                    <a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-primary">
                        Thêm mới
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?php echo e($dataTable->table()); ?>

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/product/index.blade.php ENDPATH**/ ?>