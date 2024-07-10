<section class="fp__menu mt_95 xs_mt_65">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_45">
                    <h4>Menu các món ăn</h4>
                    <h2>Những món ăn phổ biến được khách hàng bình chọn</h2>
                    <span>
                        <img src="images/heading_shapes.png" alt="shapes" class="img-fluid w-100">
                    </span>
                    <p style="text-align: justify">Chúng tôi tự hào mang đến cho khách hàng những món ăn ngon miệng, được chế biến từ những nguyên liệu tươi sạch và chất lượng. Những món ăn này không chỉ được yêu thích vì hương vị tuyệt vời mà còn vì sự tận tâm và tình yêu ẩm thực mà chúng tôi đặt vào từng món ăn. Hãy đến và trải nghiệm, để tự mình cảm nhận những món ăn được khách hàng bình chọn nhiều nhất tại nhà hàng của chúng tôi!</p>
                </div>
            </div>
        </div>

        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-12">
                <div class="menu_filter d-flex flex-wrap justify-content-center">
                    <button class=" active" data-filter="*">Menu tất cả món ăn</button>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button data-filter=".<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>

        <div class="row grid">
       <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <?php
           $products = \App\Models\Product::where(['show_at_home'=> 1, 'status'=> 1, 'category_id'=>$category->id])
           ->orderBy('id','DESC')
           ->take(8)
           ->get();
       ?>

       <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="col-xl-3 col-sm-6 col-lg-4 <?php echo e($category->slug); ?> wow fadeInUp" data-wow-duration="1s">
        <div class="fp__menu_item">
            <div class="fp__menu_item_img">
                <img src="<?php echo e(asset($product->thumb_image)); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid w-100">
                <a class="category" href="#"><?php echo e(@$product->category->name); ?></a>
            </div>
            <div class="fp__menu_item_text">
                <p class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                    <span>145</span>
                </p>
                <a class="title" href="<?php echo e(route('product.show', $product->slug )); ?>"><?php echo e($product->name); ?></a>
                <h5 class="price">
                    <?php if($product->offer_price > 0): ?>
                    <?php echo e(currencyPosition($product->offer_price)); ?>

                    <del><?php echo e(currencyPosition($product->price)); ?></del>
                    <?php else: ?>
                    <?php echo e(currencyPosition($product->price)); ?>

                    <?php endif; ?>
                </h5>
                <ul class="d-flex flex-wrap justify-content-center">
                    <li><a href="javascripts:;" onclick="loadProductModal('<?php echo e($product->id); ?>')" ><i
                                class="fas fa-shopping-basket"></i></a></li>
                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                    <li><a href="#"><i class="far fa-eye"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/home/components/menu-item.blade.php ENDPATH**/ ?>