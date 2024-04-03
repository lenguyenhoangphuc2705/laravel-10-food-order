<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1> Sản phẩm trưng bày (<?php echo e($product->name); ?>)</h1>
        </div>

        <div>
            <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-primary my-3">Trở về</a>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Tất cả hình ảnh sản phẩm</h4>

            </div>
            <div class="card-body">
                 <div class="col-md-8">
                   <form action="<?php echo e(route('admin.product-gallery.store')); ?>" method="POST" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image">

                        <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                    </div>
                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">Tải lên</button>
                    </div>
                   </form>
                 </div>
            </div>
        </div>

        <div class="card card-primary">
            
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/product/product-size/index.blade.php ENDPATH**/ ?>