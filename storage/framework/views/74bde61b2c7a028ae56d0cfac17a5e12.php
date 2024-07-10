<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Danh mục</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Cập nhật danh mục</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.category.update', $category->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e($category->name); ?>">
                    </div>

                    <div class="form-group">
                        <label>Show At Home</label>
                        <select name="show_at_home" class="form-control" id="">
                            <option <?php if($category->show_at_home == 1): echo 'selected'; endif; ?> value="1">Yes</option>
                            <option <?php if($category->show_at_home == 0): echo 'selected'; endif; ?> value="0">No</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option <?php if($category->status == 1): echo 'selected'; endif; ?> value="1">Active</option>
                            <option <?php if($category->status == 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Cập nhật</button>

                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/product/category/edit.blade.php ENDPATH**/ ?>