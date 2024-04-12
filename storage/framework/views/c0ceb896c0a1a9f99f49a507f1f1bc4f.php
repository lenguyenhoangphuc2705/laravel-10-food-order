<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
    class="fal fa-times"></i></button>
<div class="fp__cart_popup_img">
<img src="<?php echo e(asset($product->thumb_image)); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid w-100">
</div>
<div class="fp__cart_popup_text">
<a href="<?php echo e(route('product.show', $product->slug)); ?>" class="title"><?php echo $product->name; ?></a>
<p class="rating">
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star"></i>
    <i class="fas fa-star-half-alt"></i>
    <i class="far fa-star"></i>
    <span>(201)</span>
</p>
<h4 class="price">
    <?php if($product->offer_price > 0): ?>
    <?php echo e(currencyPosition($product->offer_price)); ?>

    <del><?php echo e(currencyPosition($product->price)); ?></del>
    <?php else: ?>
    <?php echo e(currencyPosition($product->offer_price)); ?>

    <?php endif; ?>
    
</h4>


<?php if($product->productSizes()->exists()): ?>
<div class="details_size">
    <h5>select size</h5>
    <?php $__currentLoopData = $product->productSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="size-<?php echo e($productSize->id); ?>">
        <label class="form-check-label" for="size-<?php echo e($productSize->id); ?>">
            <?php echo e($productSize->name); ?> <span>+ <?php echo e(currencyPosiion($productSize->price)); ?></span>
        </label>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>


<div class="details_extra_item">
    <h5>select option <span>(optional)</span></h5>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="coca-cola">
        <label class="form-check-label" for="coca-cola">
            coca-cola <span>+ $10</span>
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="7up">
        <label class="form-check-label" for="7up">
            7up <span>+ $15</span>
        </label>
    </div>
</div>

<div class="details_quentity">
    <h5>select quentity</h5>
    <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
        <div class="quentity_btn">
            <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
            <input type="text" placeholder="1">
            <button class="btn btn-success"><i class="fal fa-plus"></i></button>
        </div>
        <h3>$320.00</h3>
    </div>
</div>
<ul class="details_button_area d-flex flex-wrap">
    <li><a class="common_btn" href="#">add to cart</a></li>
</ul>
</div><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/layouts/ajax-files/product-popup-modal.blade.php ENDPATH**/ ?>