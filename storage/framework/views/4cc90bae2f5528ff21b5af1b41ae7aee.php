<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1> Kích thước sản phẩm (<?php echo e($product->name); ?>)</h1>
        </div>

        <div>
            <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-primary my-3">Trở về</a>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Thêm kích thước</h4>

            </div>
            <div class="card-body">

                   <form action="<?php echo e(route('admin.product-size.store')); ?>" method="POST" enctype="multipart/form-data">
                   <?php echo csrf_field(); ?>

                   <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id=" "   class="form-control">
                            <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="text" name="price" id=""   class="form-control">
                        </div>
                    </div>
                   </div>

                    <div class="form-group">
                       <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                   </form>

            </div>
        </div>

        <div class="card card-primary">
            
        </div>
    </section>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/product/product-size/index.blade.php ENDPATH**/ ?>