<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>

<form action="">

    <div class="fp__cart_popup_img">
        <img src="<?php echo e(asset($product->thumb_image)); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid w-100">
    </div>
    <div class="fp__cart_popup_text">
        <a href=<?php echo e(route('product.show', $product->slug)); ?>" class="title"><?php echo $product->name; ?></a>
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
            <input type="hidden" name="base_price" value="<?php echo e($product->offer_price); ?>">
                <?php echo e(currencyPosition($product->offer_price)); ?>

                <del><?php echo e(currencyPosition($product->price)); ?></del>
            <?php else: ?>
            <input type="hidden" name="base_price" value="<?php echo e($product->price); ?>">
                <?php echo e(currencyPosition($product->price)); ?>

            <?php endif; ?>
        </h4>
        <?php if($product->productSizes()->exists()): ?>
            <div class="details_size">
                <h5>select size</h5>
                <?php $__currentLoopData = $product->productSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="<?php echo e($productSize->id); ?>"
                           data-price="<?php echo e($productSize->price); ?>" name="product_size" id="size-<?php echo e($productSize->id); ?>">
                        <label class="form-check-label" for="size-<?php echo e($productSize->id); ?>">
                            <?php echo e($productSize->name); ?> <span>+ <?php echo e(currencyPosition($productSize->price)); ?></span>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <?php if($product->productOptions()->exists()): ?>
            <div class="details_extra_item">
                <h5>select option <span>(optional)</span></h5>
                <?php $__currentLoopData = $product->productOptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="product_option[]" data-price="<?php echo e($productOption->price); ?>" value="<?php echo e($productOption->id); ?>"
                            id="option-<?php echo e($productOption->id); ?>">
                        <label class="form-check-label" for="option-<?php echo e($productOption->id); ?>">
                            <?php echo e($productOption->name); ?> <span>+ <?php echo e(currencyPosition($productOption->price)); ?></span>
                        </label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>


        <div class="details_quentity">
            <h5>select quentity</h5>
            <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                <div class="quentity_btn">
                    <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                    <input type="text" placeholder="1">
                    <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                </div>
                <?php if($product->offer_price > 0): ?>
                <h3 id="total_price"><?php echo e(currencyPosition($product->offer_price)); ?></h3>
                <?php else: ?>
                <h3 id="total_price"><?php echo e(currencyPosition($product->price)); ?></h3>
                <?php endif; ?>
            </div>
        </div>
        <ul class="details_button_area d-flex flex-wrap">
            <li><a class="common_btn" href="#">add to cart</a></li>
        </ul>
    </div>
</form>
<script>
     $(document).ready(function(){
        $('input[name="product_size"]').on('change', function(){
            updateTotalPrice();
        });

        $('input[name="product_option[]"]').on('change', function(){
            updateTotalPrice();
        });

        // function to update the total price base on selected options
        function updateTotalPrice(){
            let basePrice = parseFloat($('input[name="base_price"]').val());
            let selectedSizePrice = 0;
            let selectedOptionPrice = 0;

            //Calculate selected size price
            let selectedSize = $('input[name="product_size"]:checked');
            if(selectedSize.length > 0){
                selectedSizePrice = parseFloat(selectedSize.data("price"));
            }
            
            //Calculate selected options price
            let selectedOptions = $('input[name="product_option[]"]:checked');
            $(selectedOptions).each(function(){
                selectedOptionPrice += parseFloat($(this).data("price"));
            })
           
            //Calculate the total price 
            let totalPrice = basePrice + selectedOptionPrice + selectedSizePrice;

            $('#total_price').text("<?php echo e(config('settings.site_currency_icon')); ?>"+ totalPrice);
        }
     })
</script><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/layouts/ajax-files/product-popup-modal.blade.php ENDPATH**/ ?>