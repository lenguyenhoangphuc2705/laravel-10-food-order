<?php $__env->startSection('content'); ?>
    <!--=============================
                                BREADCRUMB START
                            ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset('frontend/images/counter_bg.jpg')); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>menu Details</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">home</a></li>
                        <li><a href="javascript:;">menu Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                BREADCRUMB END
                            ==============================-->


    <!--=============================
                                MENU DETAILS START
                            ==============================-->
    <section class="fp__menu_details mt_115 xs_mt_85 mb_95 xs_mb_65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-9 wow fadeInUp" data-wow-duration="1s">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box fp__menu_details_images">
                            <ul class='exzoom_img_ul'>
                                <li><img class="zoom ing-fluid w-100" src="<?php echo e(asset($product->thumb_image)); ?>"
                                        alt="product"></li>


                                <?php $__currentLoopData = $product->productImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><img class="zoom ing-fluid w-100" src="<?php echo e(asset($image->image)); ?>" alt="product">
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                            </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_details_text">
                        <h2><?php echo $product->name; ?></h2>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>
                        <h3 class="price">
                            <?php if($product->offer_price > 0): ?>
                                <?php echo e(currencyPosition($product->offer_price)); ?>

                                <del><?php echo e(currencyPosition($product->price)); ?></del>
                            <?php else: ?>
                                <?php echo e(currencyPosition($product->price)); ?>

                            <?php endif; ?>
                        </h3>
                        <p class="short_description"><?php echo $product->short_description; ?></p>

                        <form action="" id="v_add_to_cart_form">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="base_price" class="v_base_price"
                                value="<?php echo e($product->offer_price > 0 ? $product->offer_price : $product->price); ?>">
                            <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                            <?php if($product->productSizes()->exists()): ?>
                                <div class="details_size">
                                    <h5>select size</h5>

                                    <?php $__currentLoopData = $product->productSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input class="form-check-input v_product_size" type="radio"
                                                name="product_size" id="size-<?php echo e($productSize->id); ?>"
                                                data-price="<?php echo e($productSize->price); ?>" value="<?php echo e($productSize->id); ?>">
                                            <label class="form-check-label" for="size-<?php echo e($productSize->id); ?>">
                                                <?php echo e($productSize->name); ?> <span>+
                                                    <?php echo e(currencyPosition($productSize->price)); ?></span>
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
                                            <input class="form-check-input v_product_option" name="product_option[]"
                                                type="checkbox" value="<?php echo e($productOption->id); ?>" id="option-<?php echo e($productOption->id); ?>"
                                                data-price="<?php echo e($productOption->price); ?>">
                                            <label class="form-check-label" for="option-<?php echo e($productOption->id); ?>">
                                                <?php echo e($productOption->name); ?> <span>+
                                                    <?php echo e(currencyPosition($productOption->price)); ?></span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            <?php endif; ?>

                            <div class="details_quentity">
                                <h5>select quentity</h5>
                                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                    <div class="quentity_btn">
                                        <button class="btn btn-danger v_decrement"><i class="fal fa-minus"></i></button>
                                        <input type="text" name="quantity" placeholder="1" value="1" readonly
                                            id="v_quantity">
                                        <button class="btn btn-success v_increment"><i class="fal fa-plus"></i></button>
                                    </div>
                                    <h3 id="v_total_price">
                                        <?php echo e($product->offer_price > 0 ? currencyPosition($product->offer_price) : currencyPosition($product->price)); ?>

                                    </h3>
                                </div>
                            </div>
                        </form>




                        <ul class="details_button_area d-flex flex-wrap">
                            <li><a class="common_btn v_submit_button" href="#">Thêm vào giỏ hàng</a></li>
                            <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="menu_det_description">
                                    <?php echo $product->long_description; ?>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="fp__review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>04 reviews</h4>
                                            <div class="fp__comment pt-0 mt_20">
                                                <div class="fp__single_comment m-0 border-0">
                                                    <img src="images/comment_img_1.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Michel Holder <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/chef_1.jpg" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>salina khan <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/comment_img_2.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Mouna Sthesia <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/chef_3.jpg" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>marjan janifar <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <a href="#" class="load_more">load More</a>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fp__post_review">
                                                <h4>write a Review</h4>
                                                <form>
                                                    <p class="rating">
                                                        <span>select your rating : </span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <textarea rows="3" placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php if(count($relateProducts) > 0): ?>
                <div class="fp__related_menu mt_90 xs_mt_60">
                    <h2>related item</h2>
                    <div class="row related_product_slider">
                        <?php $__currentLoopData = $relateProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                                <div class="fp__menu_item">
                                    <div class="fp__menu_item_img">
                                        <img src="<?php echo e(asset($relatedProduct->thumb_image)); ?>"
                                            alt="<?php echo e($relatedProduct->name); ?>" class="img-fluid w-100">
                                        <a class="category" href="#"><?php echo e(@$relatedProduct->category->name); ?></a>
                                    </div>
                                    <div class="fp__menu_item_text">
                                        <p class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <span>74</span>
                                        </p>
                                        <a class="title"
                                            href="<?php echo e(route('product.show', $relatedProduct->slug)); ?>"><?php echo $relatedProduct->name; ?></a>
                                        <h5 class="price">
                                            <?php if($relatedProduct->offer_price > 0): ?>
                                                <?php echo e(currencyPosition($relatedProduct->offer_price)); ?>

                                                <del><?php echo e(currencyPosition($relatedProduct->price)); ?></del>
                                            <?php else: ?>
                                                <?php echo e(currencyPosition($relatedProduct->price)); ?>

                                            <?php endif; ?>


                                        </h5>
                                        <ul class="d-flex flex-wrap justify-content-center">
                                            <li><a href="javascript:;" onclick="loadProductModal('<?php echo e($relatedProduct->id); ?>')"><i
                                                        class="fas fa-shopping-basket"></i></a></li>
                                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                            <li><a href="#"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {

            $('.v_product_size, .v_product_option').prop('checked', false);


            $('.v_product_size, .v_product_option').on('change', function() {
                v_updateTotalPrice();
            });

            //event handler for increment and decrement
            $('.v_increment').on('click', function(e) {
                e.preventDefault()
                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                quantity.val(currentQuantity + 1);
                v_updateTotalPrice()
            })

            $('.v_decrement').on('click', function(e) {
                e.preventDefault()
                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                if (currentQuantity > 1) {
                    quantity.val(currentQuantity - 1);
                    v_updateTotalPrice()
                }

            })

            // function to update the total price base on selected options
            function v_updateTotalPrice() {
                let basePrice = parseFloat($('.v_base_price').val());
                let selectedSizePrice = 0;
                let selectedOptionPrice = 0;
                let quantity = parseFloat($('#v_quantity').val());

                //Calculate selected size price
                $('.v_product_size:checked').each(function() {
                    selectedSizePrice += parseFloat($(this).data("price"));
                });

                //Calculate selected options price
                $('.v_product_option:checked').each(function() {
                    selectedOptionPrice += parseFloat($(this).data("price"));
                });

                //Calculate the total price 
                let totalPrice = (basePrice + selectedOptionPrice + selectedSizePrice) * quantity;
                $('#v_total_price').text("<?php echo e(config('settings.site_currency_icon')); ?>" + totalPrice);
            }

            $('.v_submit_button').on('click', function(e) {
                e.preventDefault();
                $("#v_add_to_cart_form").submit();
            })
            // Add to cart function
            $("#v_add_to_cart_form").on('submit', function(e) {
                e.preventDefault();

                //Validation
                let selectedSize = $(".v_product_size");
                if (selectedSize.length > 0) {
                    if ($(".v_product_size:checked").val() === undefined) {
                        toastr.error('Vui lòng chọn kích thước sản phẩm');
                        console.error('Vui lòng chọn kích thước sản phẩm');
                        return;
                    }
                }


                let formData = $(this).serialize();
                $.ajax({
                    method: 'post', // Changed to lowercase 'post'
                    url: '<?php echo e(route('add-to-cart')); ?>',
                    data: formData,
                    beforeSend: function() {
                        $('.v_submit_button').attr('disabled', true);
                        $('.v_submit_button').html(
                            '<span class="spinner-border spinner-border-sm" aria-hidden="true"></span> <span role="status"> Loading... </span>'
                        );
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        updateSidebarCart();
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    complete: function() { // Changed 'completed' to 'complete'
                        $('.v_submit_button').html('Add to Cart');
                        $('.v_submit_button').attr('disabled', false);
                    }
                })

            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/pages/product-view.blade.php ENDPATH**/ ?>