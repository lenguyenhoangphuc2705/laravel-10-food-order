<?php $__env->startSection('content'); ?>
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset('frontend/images/login_bg.jpg')); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>reset password</h1>
                    <ul>
                        <li><a href="javascript:;">home</a></li>
                        <li><a href="#">reset password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            BREADCRUMB END
        ==============================-->


   <!--=========================
        FORGOT PASSWORD START
    ==========================-->
    <section class="fp__signin" style="background: url(<?php echo e(asset('frontend/images/login_bg.jpg')); ?>);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>forgot password</p>
                            <form method="POST" action="<?php echo e(route('password.store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                                        <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>email</label>
                                            <input type="email" name="email" value="<?php echo e(old('email', $request->email)); ?>" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>password</label>
                                            <input type="password" name="password"  placeholder="Password">
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>confirm password</label>
                                            <input  type="password" name="password_confirmation" placeholder="Password">
                                        </div>
                                    </div>


                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">reset password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="create_account d-flex justify-content-between">
                                <a href="<?php echo e(route('login')); ?>">login</a>
                                <a href="<?php echo e(route('register')); ?>">Create Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        FORGOT PASSWORD END
    ==========================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>