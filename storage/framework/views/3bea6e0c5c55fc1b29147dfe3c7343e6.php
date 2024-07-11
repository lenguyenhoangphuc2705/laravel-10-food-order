<?php $__env->startSection('content'); ?>
<!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Đăng kí</h1>
                    <ul>
                        <li><a href="index.html">Trang chủ</a></li>
                        <li><a href="#">Đăng kí</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
          SIGN UP START
    ==========================-->
    <section class="fp__signup" style="background: url( <?php echo e(asset('frontend/images/login_bg.jpg')); ?> );">
        <div class="fp__signup_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class=" container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Chào mừng đến với nhà hàng ẩm thực MNP!</h2>
                            <p>Đăng kí</p>
                            <form method="POST" action = "<?php echo e(route('register')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Họ và tên</label>
                                            <input type="text" placeholder="Họ và tên" name="name" value="<?php echo e(old('name')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>email</label>
                                            <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
                                        </div>
                                    </div>


                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Mật khẩu</label>
                                            <input type="password" name="password" placeholder="Mật khẩu">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>Nhập lại mật khẩu</label>
                                            <input type="password" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                        </div>
                                    </div>


                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Đăng kí</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="or"><span>or</span></p>

                            <p class="create_account">Đã có tài khoản? <a href="<?php echo e(route('login')); ?>">Đăng nhập</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGN UP END
    ==========================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/auth/register.blade.php ENDPATH**/ ?>