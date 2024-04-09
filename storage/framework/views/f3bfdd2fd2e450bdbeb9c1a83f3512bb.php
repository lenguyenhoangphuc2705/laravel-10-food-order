<script>
    //Load product modal 
    function loadProductModal(productId){
        $.ajax({
            method: 'GET',
            url: '<?php echo e(route("load-product-modal", ":productId")); ?>'.replace(':productId', productId) ,
            success: function(response){
               $(".load_product_modal_body").html(response);
               $('#cartModal').modal('show');
            },
            error: function(xhr, status, error){
                console.error(error);
            }
        }
        )
    }
</script><?php /**PATH C:\laragon\www\laravel-10-food-order\resources\views/frontend/layouts/global-scripts.blade.php ENDPATH**/ ?>