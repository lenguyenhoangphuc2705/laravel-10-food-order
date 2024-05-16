<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Phiếu Mua Hàng</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Thêm Mới Phiếu Mua Hàng</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.coupon.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Mã Giảm Giá</label>
                        <input type="text" name="code" class="form-control" value="<?php echo e(old('code')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Số Lượng Phiếu Giảm Gía</label>
                        <input type="text" name="quantity" class="form-control" value="<?php echo e(old('quantity')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Gía Mua Tối Thiểu</label>
                        <input type="text" name="min_purchase_amount" class="form-control"  value="<?php echo e(old('min_purchase_amount')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Hạn Sử Dụng</label>
                        <input type="date" name="expire_date" class="form-control" value="<?php echo e(old('date')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Loại Giảm Giá</label>
                        <select name="discount_type" class="form-control" id="">
                            <option value="1">Percent</option>
                            <option value="0">Amount (<?php echo e(config('settings.site_currency_icon')); ?>)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Gía Giảm</label>
                        <input type="text" name="discount" class="form-control" value="<?php echo e(old('discount')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Hoạt động</option>
                            <option value="0">Ngưng hoạt động</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo</button>

                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/coupon/create.blade.php ENDPATH**/ ?>