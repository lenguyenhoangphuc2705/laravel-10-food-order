<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Thanh trượt</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Cập nhật thanh trượt</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.slider.update', $slider->id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div id="image-preview" class = "image-preview">
                            <label for="image-upload" id="image-label">Chọn ảnh</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Lời đề nghị</label>
                        <input type="text" name="offer" class="form-control" value="<?php echo e($slider->offer); ?>">
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="title" class="form-control" value="<?php echo e($slider->title); ?>">
                    </div>

                    <div class="form-group">
                        <label>Phụ đề</label>
                        <input type="text" name="sub_title" class="form-control" value="<?php echo e($slider->sub_title); ?>">
                    </div>


                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea name="short_description" class="form-control" ><?php echo e($slider->short_description); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nút liên kết</label>
                        <input type="text" name="button_link" class="form-control" value="<?php echo e($slider->button_link); ?>">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control" id="">
                            <option <?php if($slider->status === 1): echo 'selected'; endif; ?> value="1">Hoạt động</option>
                            <option <?php if($slider->status === 0): echo 'selected'; endif; ?> value="0">Ngừng hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>

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