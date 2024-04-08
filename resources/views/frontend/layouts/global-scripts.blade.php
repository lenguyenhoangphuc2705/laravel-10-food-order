<script>
    //Load product modal 
    function loadProductModal(productId){
        s.ajax({
            method: 'GET',
            url: '{{ route("load-product-modal", ":productId") }}'.replace(':productId', productId) ,
            success: function(response){
               
            },
            error: function(xhr, status, error){
                console.error(error);
            }
        }
        )
    }
</script>