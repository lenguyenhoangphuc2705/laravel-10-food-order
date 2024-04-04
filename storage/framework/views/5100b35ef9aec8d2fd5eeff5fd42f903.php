<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Hồ sơ</h1>
        </div>

        <div class="section-body">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Cập nhật cài đặt người dùng</h4>

                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-froup">
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="avatar" id="image-upload" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" class="form-control" name="name" value="<?php echo e(auth()->user()->name); ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo e(auth()->user()->email); ?>">
                        </div>

                        <button class="btn btn-primary" style="submit">Lưu</button>
                    </form>
                </div>
            </div>


            <div class="card card-primary">
                <div class="card-header">
                    <h4>Cập nhật mật khẩu</h4>

                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('admin.profile.password.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label>Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" name="current_password">
                        </div>

                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <button class="btn btn-primary" style="submit">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function(){
        $('.image-preview').css({
            'background-image': 'url(<?php echo e(asset(auth()->user()->avatar)); ?>)',
            'background-size': 'cover',
            'background-position': 'center center'
        })
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/profile/index.blade.php ENDPATH**/ ?>