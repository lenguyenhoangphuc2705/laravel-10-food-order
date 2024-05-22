<?php $__env->startSection('content'); ?>
<section class="section">
    <div class="section-header">
        <h1>Phiếu Mua Hàng</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Cập Nhật Phiếu Mua Hàng</h4>

        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.coupon.update', $coupon->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="name" class="form-control" value="<?php echo e($coupon->name); ?>">
                </div>

                <div class="form-group">
                    <label>Mã Giarm Gía</label>
                    <input type="text" name="code" class="form-control" value="<?php echo e($coupon->code); ?>">
                </div>

                <div class="form-group">
                    <label>Số Lượng Phiếu Giảm Gía</label>
                    <input type="text" name="quantity" class="form-control" value="<?php echo e($coupon->quantity); ?>">
                </div>

                <div class="form-group">
                    <label>Gía Mua Tối Thiểu</label>
                    <input type="text" name="min_purchase_amount" class="form-control" value="<?php echo e($coupon->min_purchase_amount); ?>">
                </div>

                <div class="form-group">
                    <label>Hạn Sử Dụng</label>
                    <input type="date" name="expire_date" class="form-control" value="<?php echo e($coupon->expire_date); ?>">
                </div>

                <div class="form-group">
                    <label>Loại Giảm Giá</label>
                    <select name="discount_type" class="form-control" id="">
                        <option <?php if($coupon->discount_type === 'percent'): echo 'selected'; endif; ?> value="percent">Phần trăm</option>
                        <option <?php if($coupon->discount_type === 'amount'): echo 'selected'; endif; ?> value="amount">Gía tiền (<?php echo e(config('settings.site_currency_icon')); ?>)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Gía Giảm</label>
                    <input type="text" name="discount" class="form-control" value="<?php echo e($coupon->discount); ?>">
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control" id="">
                        <option <?php if($coupon->status === 1): echo 'selected'; endif; ?> value="1">Hoạt Động</option>
                        <option <?php if($coupon->status === 0): echo 'selected'; endif; ?> value="0">Ngưng Hoạt Động</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/coupon/edit.blade.php ENDPATH**/ ?>