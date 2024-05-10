<input type="hidden" value="<?php echo e(cartTotal()); ?>" id="cart_total">
<input type="hidden" value="<?php echo e(count(Cart::content())); ?>" id="cart_product_count">
<?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li>
        <div class="menu_cart_img">
            <img src="<?php echo e(asset($cartProduct->options->product_info['image'])); ?>" alt="menu" class="img-fluid w-100">
        </div>
        <div class="menu_cart_text">
            <a class="title"
                href=<?php echo e(route('product.show', $cartProduct->options->product_info['slug'])); ?>"><?php echo $cartProduct->name; ?>

            </a>
            <p class="size">Số lượng: <?php echo e($cartProduct->qty); ?></p>
            <p class="size"><?php echo e(@$cartProduct->options->product_size['name']); ?>

                <?php echo e(@$cartProduct->options->product_size['price'] ? '(' . currencyPosition(@$cartProduct->options->product_size['price']) . ')' : ''); ?>

            </p>
            <?php if($cartProduct->options && $cartProduct->options->product_options): ?>
            <?php $__currentLoopData = $cartProduct->options->product_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProductOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <span class="extra"><?php echo e($cartProductOption['name']); ?>

                    (<?php echo e(currencyPosition($cartProductOption['price'])); ?>)
                </span>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <p class="price"><?php echo e(currencyPosition($cartProduct->price)); ?></p>
        </div>
        <span class="del_icon"><i class="fal fa-times"></i></span>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/layouts/ajax-files/sidebar-cart-item.blade.php ENDPATH**/ ?>