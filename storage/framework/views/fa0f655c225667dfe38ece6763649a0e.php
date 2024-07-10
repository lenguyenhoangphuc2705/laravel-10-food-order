<?php $__env->startSection('content'); ?>
    <section class="section">
        <div class="section-header">
            <h1>Sản Phẩm</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Thêm mới sản phẩm</h4>

            </div>
            <div class="card-body">
                <form action="<?php echo e(route('admin.product.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>


                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>">
                    </div>


                    <div class="form-group">
                        <label>Category</label>
                        <select name="category" class="form-control select2" id="">
                            <option value="">select</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="<?php echo e(old('price')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" name="offer_price" class="form-control" value="<?php echo e(old('offer_price')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="text" name="quantity" class="form-control" value="<?php echo e(old('quantity')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control" id=""><?php echo e(old('short_description')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control summernote" id=""><?php echo e(old('long_description')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Sku</label>
                        <input type="text" name="sku" class="form-control" value="<?php echo e(old('sku')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Seo Title</label>
                        <input type="text" name="seo_title" class="form-control" value="<?php echo e(old('seo_title')); ?>">
                    </div>

                    <div class="form-group">
                        <label>Seo Description</label>
                        <textarea name="seo_description" class="form-control" id=""><?php echo e(old('seo_description')); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Hiển thị trên trang chủ</label>
                        <select name="show_at_home" class="form-control" id="">
                            <option selected value="1">Yes</option>
                            <option  value="0">No</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control" id="">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tạo mới</button>

                </form>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/product/create.blade.php ENDPATH**/ ?>