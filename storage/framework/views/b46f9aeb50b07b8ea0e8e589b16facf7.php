<section class="fp__banner" style="background: url(<?php echo e((asset('frontend/images/banner_bg.jpg'))); ?>);">
    <div class="fp__banner_overlay">
        <div class="row banner_slider">
            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12">
                    <div class="fp__banner_slider">
                        <div class=" container">
                            <div class="row">
                                <div class="col-xl-5 col-md-5 col-lg-5">
                                    <div class="fp__banner_img wow fadeInLeft" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="<?php echo e(asset($slider->image)); ?>" alt="food item"
                                                class="img-fluid w-100">
                                                <?php if($slider->offer): ?>
                                                <?php endif; ?>
                                            <span> <?php echo e($slider->offer); ?> </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-7 col-lg-6">
                                    <div class="fp__banner_text wow fadeInRight" data-wow-duration="1s">
                                        <h1><?php echo $slider->title; ?></h1>
                                        <h3><?php echo $slider->sub_title; ?></h3>
                                        <p><?php echo $slider->short_description; ?></p>

                                        <ul class="d-flex flex-wrap">
                                            <?php if($slider->button_link): ?>
                                            <li><a class="common_btn" href="<?php echo e($slider->button_link); ?>">Đặt món ngay</a></li>
                                            <?php endif; ?>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/home/components/slider.blade.php ENDPATH**/ ?>