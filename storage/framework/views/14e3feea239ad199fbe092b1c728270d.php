<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/fontawesome/css/all.min.css')); ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-social/bootstrap-social.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/toastr.min.css')); ?>">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/components.css')); ?>">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments) asset;
        }
        admin /
            gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="assets/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Đăng nhập</h4>
                            </div>

                            <div class="card-body">
                                <form action="<?php echo e(route('login')); ?>" method="POST" class="needs-validation"
                                    novalidate="">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus value="<?php echo e(old('email')); ?>">
                                        <div class="invalid-feedback">
                                           Vui lòng nhập email của bạn!
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Mật Khẩu</label>
                                            <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                   Quên mật khẩu
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                           Vui lòng nhập mật khẩu của bạn!
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Đăng nhập
                                        </button>
                                    </div>
                                </form>



                            </div>
                        </div>

                        <div class="simple-footer">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('admin/assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/stisla.js')); ?>"></script>

    <!-- JS Libraies -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/toastr.min.css')); ?>">
    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo e(asset('admin/assets/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/custom.js')); ?>"></script>


 <!-- show dynamic validation message-->
 <script>
    toastr.options.progressBar = true;
    <?php if($errors->any()): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>")
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</script>

</body>

</html>
<?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/auth/login.blade.php ENDPATH**/ ?>