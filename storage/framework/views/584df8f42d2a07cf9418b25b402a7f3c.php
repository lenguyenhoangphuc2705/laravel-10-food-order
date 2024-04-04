<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Thanh trượt</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Thêm mới thanh trượt</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.slider.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <div id="image-preview" class = "image-preview">
                            <label for="image-upload" id="image-label">Chọn ảnh</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Lời đề nghị</label>
                        <input type="text" name="offer" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Phụ đề</label>
                        <input type="text" name="sub_title" class="form-control">
                    </div>


                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea name="short_description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Nút liên kết</label>
                        <input type="text" name="button_link" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo</button>

                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/slider/create.blade.php ENDPATH**/ ?>