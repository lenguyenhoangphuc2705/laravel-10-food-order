<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Sản Phẩm</h1>
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

            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/product/gallery/index.blade.php ENDPATH**/ ?>