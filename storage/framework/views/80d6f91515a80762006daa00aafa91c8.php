<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>FoodPark || Restaurant Template</title>

    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/spacing.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/venobox.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery.exzoom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/toastr.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/custom.css')); ?>">

    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>
    <div class="overlay-container d-none">
        <div class="overlay">
            <span class="loader"></span>
        </div>
    </div>

    <!--=============================
        CART POPUP MODAL START
    ==============================-->
    <div class="fp__cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body load_product_modal_body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--=============================
        CART POPUP MODAL END
    ==============================-->

    <!--=============================
        TOPBAR START
    ==============================-->
    <section class="fp__topbar">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8">
                    <ul class="fp__topbar_info d-flex flex-wrap">
                        <li><a href="mailto:example@gmail.com"><i class="fas fa-envelope"></i> Unifood@gmail.com</a>
                        </li>
                        <li><a href="callto:123456789"><i class="fas fa-phone-alt"></i> +96487452145214</a></li>
                    </ul>
                </div>
                <div class="col-xl-6 col-md-4 d-none d-md-block">
                    <ul class="topbar_icon d-flex flex-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a> </li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a> </li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a> </li>
                        <li><a href="#"><i class="fab fa-behance"></i></a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        TOPBAR END
    ==============================-->


    <!--=============================
        MENU START
    ==============================-->
    <?php echo $__env->make('frontend.layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--=============================
        MENU END
    ==============================-->


    <?php echo $__env->yieldContent('content'); ?>


    <!--=============================
        FOOTER START
    ==============================-->
    <?php echo $__env->make('frontend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--=============================
        FOOTER END
    ==============================-->


    <!--=============================
        SCROLL BUTTON START
    ==============================-->
    <div class="fp__scroll_btn">
        go to top
    </div>
    <!--=============================
        SCROLL BUTTON END
    ==============================-->


    <!--jquery library js-->
    <script src="<?php echo e(asset('frontend/js/jquery-3.6.0.min.js')); ?>"></script>
    <!--bootstrap js-->
    <script src="<?php echo e(asset('frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <!--font-awesome js-->
    <script src="<?php echo e(asset('frontend/js/Font-Awesome.js')); ?>"></script>
    <!-- slick slider -->
    <script src="<?php echo e(asset('frontend/js/slick.min.js')); ?>"></script>
    <!-- isotop js -->
    <script src="<?php echo e(asset('frontend/js/isotope.pkgd.min.js')); ?>"></script>
    <!-- simplyCountdownjs -->
    <script src="<?php echo e(asset('frontend/js/simplyCountdown.js')); ?>"></script>
    <!-- counter up js -->
    <script src="<?php echo e(asset('frontend/js/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('frontend/js/jquery.countup.min.js')); ?>"></script>
    <!-- nice select js -->
    <script src="<?php echo e(asset('frontend/js/jquery.nice-select.min.js')); ?>"></script>
    <!-- venobox js -->
    <script src="<?php echo e(asset('frontend/js/venobox.min.js')); ?>"></script>
    <!-- sticky sidebar js -->
    <script src="<?php echo e(asset('frontend/js/sticky_sidebar.js')); ?>"></script>
    <!-- wow js -->
    <script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
    <!-- ex zoom js -->
    <script src="<?php echo e(asset('frontend/js/jquery.exzoom.js')); ?>"></script>

    <script src="<?php echo e(asset('frontend/js/toastr.min.js')); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--main/custom js-->
    <script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>


    <!-- show dynamic validation message-->
    <script>
        toastr.options.progressBar = true;

        <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                toastr.error("<?php echo e($error); ?>")
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        // Set csrf at ajax header
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('.button-click').click();
        })
    </script>

    <?php echo $__env->make('frontend.layouts.global-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>