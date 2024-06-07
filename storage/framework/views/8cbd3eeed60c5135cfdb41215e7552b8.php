<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
aria-labelledby="v-pills-home-tab">
<div class="fp_dashboard_body">
    <h3>Welcome to your Profile</h3>

    <div class="fp__dsahboard_overview">
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>total order <span>(76)</span></h4>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item green">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>Completed <span>(71)</span></h4>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-md-4">
                <div class="fp__dsahboard_overview_item red">
                    <span class="icon"><i class="far fa-shopping-basket"></i></span>
                    <h4>cancel <span>(05)</span></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="fp_dash_personal_info">
        <h4>Thông tin cá nhân
            <a class="dash_info_btn">
                <span class="edit">Chỉnh sửa</span>
                <span class="cancel">Hủy</span>
            </a>
        </h4>

        <div class="personal_info_text">
            <p><span>Họ tên:</span> <?php echo e(auth()->user()->name); ?></p>
            <p><span>Email:</span> <?php echo e(auth()->user()->email); ?></p>

        </div>

        <div class="fp_dash_personal_info_edit comment_input p-0">
            <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field("PUT"); ?>
                <div class="row">
                    <div class="col-12">
                        <div class="fp__comment_imput_single">
                            <label>name</label>
                            <input type="text" placeholder="Name" name = "name" value="<?php echo e(auth()->user()->name); ?>">
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <div class="fp__comment_imput_single">
                            <label>email</label>
                            <input type="email" placeholder="Email" name="email" value="<?php echo e(auth()->user()->email); ?>">
                        </div>
                    </div>

                    <div class="col-xl-12">

                        <button type="submit" class="common_btn">submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/dashboard/sections/personal-info-section.blade.php ENDPATH**/ ?>