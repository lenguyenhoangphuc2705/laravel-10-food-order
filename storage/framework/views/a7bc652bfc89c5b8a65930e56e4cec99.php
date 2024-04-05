<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/fontawesome/css/all.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/toastr.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/bootstrap-iconpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/select2/dist/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/summernote/summernote-bs4.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('admin/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">



    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin/assets/css/components.css')); ?>"> <!-- General CSS Files -->
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <div class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('admin/assets/modules/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/tooltip.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/stisla.js')); ?>"></script>

    <script src="<?php echo e(asset('admin/assets/js/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo e(asset('admin/assets/modules/select2/dist/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/summernote/summernote-bs4.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
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

    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        //  //Set csrf at ajax header
        //  $.ajaxSetup({
        //     header:{
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        $(document).ready(function() {

            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault()

                let url = $(this).attr('href');


                Swal.fire({
                    title: "Bạn chắc chắn muốn xóa?",
                    text: "Bạn sẽ không thể hoàn tác điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Hủy",
                    confirmButtonText: "Vâng, tiếp tục xóa!"
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "<?php echo e(csrf_token()); ?>"
                            },
                            success: function(response) {
                                if (response.status === 'success') {

                                    Swal.fire({
                                        icon: "success",
                                        title: "Xóa thành công"
                                    });
                                    // toastr.success(response.message)
                                    setTimeout(function() {
                                        window.location.reload();
                                    }, 2000);

                                } else if (response.status === 'error') {
                                    toastr.error(response.message)
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        })
                    }
                });
            })
        })
    </script>


    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>