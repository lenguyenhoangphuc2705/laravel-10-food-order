<?php $__env->startSection('content'); ?>
    <!--=============================
                            BREADCRUMB START
                        ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset('frontend/images/counter_bg.jpg')); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>cart view</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">cart view</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                            BREADCRUMB END
                        ==============================-->


    <!--============================
                            CART VIEW START
                        ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="fp__pro_img">
                                            Hình ảnh
                                        </th>

                                        <th class="fp__pro_name">
                                            Chi tiết
                                        </th>

                                        <th class="fp__pro_status">
                                            Đơn giá
                                        </th>

                                        <th class="fp__pro_select">
                                            Số lượng
                                        </th>

                                        <th class="fp__pro_tk">
                                            Tổng cộng
                                        </th>

                                        <th class="fp__pro_icon">
                                            <a class="clear_all" href="<?php echo e(route('cart.destroy')); ?>">Xóa tất cả</a>
                                        </th>
                                    </tr>

                                    <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="fp__pro_img"><img
                                                    src="<?php echo e($product->options->product_info['image']); ?>" alt="product"
                                                    class="img-fluid w-100">
                                            </td>

                                            <td class="fp__pro_name">
                                                <a
                                                    href="<?php echo e(route('product.show', $product->options->product_info['slug'])); ?>"><?php echo e($product->name); ?></a>
                                                <span><?php echo e($product->options->product_size['name']); ?>

                                                    <?php echo e(currencyPosition($product->options->product_size['price'])); ?></span>
                                                <?php if(isset($product->options->product_options) && !empty($product->options->product_options)): ?>
                                                    <?php $__currentLoopData = $product->options->product_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <p><?php echo e($option->name); ?> <?php echo e(currencyPosition($option->price)); ?></p>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </td>

                                            <td class="fp__pro_status">
                                                <h6><?php echo e(currencyPosition($product->price)); ?></h6>
                                            </td>

                                            <td class="fp__pro_select">
                                                <div class="quentity_btn">
                                                    <button class="btn btn-danger decrement"><i
                                                            class="fal fa-minus"></i></button>
                                                    <input type="text" class="quantity" data-id="<?php echo e($product->rowId); ?>"
                                                        placeholder="1" value="<?php echo e($product->qty); ?>" readonly>
                                                    <button class="btn btn-success increment"><i
                                                            class="fal fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="fp__pro_tk">
                                                <h6 class="product_cart_total">
                                                    <?php echo e(currencyPosition(productTotal($product->rowId))); ?></h6>
                                            </td>

                                            <td class="fp__pro_icon">
                                                <a href="#" class="remove_cart_product"
                                                    data-id="<?php echo e($product->rowId); ?>"><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(Cart::content()->count() === 0): ?>
                                        <tr>
                                            <td colspan="6" class="text-center" style="width: 100%; display: inline;">Giỏ
                                                hàng trống</td>
                                        </tr>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>total cart</h6>
                        <p>subtotal: <span>$124.00</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span>$10.00</span></p>
                        <p class="total"><span>total:</span> <span>$134.00</span></p>
                        <form>
                            <input type="text" placeholder="Coupon Code">
                            <button type="submit">apply</button>
                        </form>
                        <a class="common_btn" href=" #">checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                            CART VIEW END
                        ==============================-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.increment').on('click', function() {
                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");
                inputField.val(currentValue + 1);


                cartQtyUpdate(rowId, inputField.val(), function(response) {
                    if (response.status === 'success') {
                        inputField.val(response.qty);
                        let productTotal = response.product_total;
                        console.log($(this));
                        inputField.closest("tr")
                            .find(".product_cart_total")
                            .text("<?php echo e(currencyPosition(':productTotal')); ?>"
                                .replace(":productTotal", productTotal));
                    } else if (response.status === 'error') {
                        inputField.val(response.qty);
                        toastr.error(response.message);
                    }
                });
            });

            $('.decrement').on('click', function() {
                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");
                inputField.val(currentValue - 1);

                if (inputField.val() > 1) {


                    cartQtyUpdate(rowId, inputField.val(), function(response) {
                        if (response.status === 'success') {
                            inputField.val(response.qty);
                            let productTotal = response.product_total;
                            console.log($(this));
                            inputField.closest("tr")
                                .find(".product_cart_total")
                                .text("<?php echo e(currencyPosition(':productTotal')); ?>"
                                    .replace(":productTotal", productTotal));
                        } else if (response.status === 'error') {
                            inputField.val(response.qty);
                            toastr.error(response.message);
                        }
                    });
                }
            })

            function cartQtyUpdate(rowId, qty, callback) {
                $.ajax({
                    method: 'post',
                    url: '<?php echo e(route("cart.quantity-update")); ?>',
                    data: {
                        'rowId': rowId,
                        'qty': qty,
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        if (callback && typeof callback === 'function') {
                            callback(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }

            $('.remove_cart_product').on('click', function(e) {
                e.preventDefault();
                let rowId = $(this).data('id');
                removeCartProduct(rowId);
                $(this).closest('tr').remove();
            })

            function removeCartProduct(rowId) {
                $.ajax({
                    method: 'get',
                    url: '<?php echo e(route("cart-product-remove", ":rowId")); ?>'.replace(":rowId", rowId),

                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        updateSidebarCart();
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/pages/cart-view.blade.php ENDPATH**/ ?>