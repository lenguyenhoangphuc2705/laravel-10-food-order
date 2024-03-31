<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us Section</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Item</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.why-choose-us.update', $whyChooseUs->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                   <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Icon</label>
                        <br>
                        <button data-icon="<?php echo e($whyChooseUs->icon); ?>" class="btn btn-primary" role="iconpicker" name="icon" ></button>
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($whyChooseUs->title); ?>">
                    </div>




                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control"><?php echo e($whyChooseUs->short_description); ?></textarea>
                    </div>


                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                        <option <?php if($whyChooseUs->status === 1): echo 'selected'; endif; ?> value="1">Yes</option>
                        <option <?php if($whyChooseUs->status === 0): echo 'selected'; endif; ?> value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/why-choose-us/edit.blade.php ENDPATH**/ ?>