<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Slider</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.slider.update', $slider->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class = "image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Offer</label>
                        <input type="text" name="offer" class="form-control" value="<?php echo e($slider->offer); ?>">
                    </div>

                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($slider->title); ?>">
                    </div>

                    <div class="form-group">
                        <label>Sub_Title</label>
                        <input type="text" name="sub_title" class="form-control" value="<?php echo e($slider->sub_title); ?>">
                    </div>
                    

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control" ><?php echo e($slider->short_description); ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Button Link</label>
                        <input type="text" name="button_link" class="form-control" value="<?php echo e($slider->button_link); ?>">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" id="">
                            <option <?php if($slider->status === 1): echo 'selected'; endif; ?> value="1">Active</option>
                            <option <?php if($slider->status === 0): echo 'selected'; endif; ?> value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>

                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function(){
            $('.image-preview').css({
                'background-image': 'url(<?php echo e(asset($slider->image)); ?>)',
                'background-size': 'cover',
                'background-position':'center center'
            })
        })
    </script>
    
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/slider/edit.blade.php ENDPATH**/ ?>