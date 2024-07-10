@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                    BREADCRUMB START
            ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset('frontend/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>cart view</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">cart view</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                    BREADCRUMB END
                                ==============================-->


    <!--============================
                                    CART VIEW START
                                ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th class="fp__pro_img">
                                            Hình ảnh
                                        </th>

                                        <th class="fp__pro_name">
                                            Chi tiết
                                        </th>

                                        <th class="fp__pro_status">
                                            Đơn giá
                                        </th>

                                        <th class="fp__pro_select">
                                            Số lượng
                                        </th>

                                        <th class="fp__pro_tk">
                                            Tổng cộng
                                        </th>

                                        <th class="fp__pro_icon">
                                            <a class="clear_all" href="{{ route('cart.destroy') }}">Xóa tất cả</a>
                                        </th>
                                    </tr>

                                    @foreach (Cart::content() as $product)
                                        <tr>
                                            <td class="fp__pro_img"><img
                                                    src="{{ $product->options->product_info['image'] }}" alt="product"
                                                    class="img-fluid w-100">
                                            </td>

                                            <td class="fp__pro_name">
                                                <a
                                                    href="{{ route('product.show', $product->options->product_info['slug']) }}">{{ $product->name }}</a>
                                                <span>{{ $product->options->product_size['name'] }}
                                                    {{ currencyPosition($product->options->product_size['price']) }}</span>
                                                @if (isset($product->options->product_options) && !empty($product->options->product_options))
                                                    @foreach ($product->options->product_options as $option)
                                                        <p>{{ $option->name }} {{ currencyPosition($option->price) }}</p>
                                                    @endforeach
                                                @endif
                                            </td>

                                            <td class="fp__pro_status">
                                                <h6>{{ currencyPosition($product->price) }}</h6>
                                            </td>

                                            <td class="fp__pro_select">
                                                <div class="quentity_btn">
                                                    <button class="btn btn-danger decrement"><i
                                                            class="fal fa-minus"></i></button>
                                                    <input type="text" class="quantity" data-id="{{ $product->rowId }}"
                                                        placeholder="1" value="{{ $product->qty }}" readonly>
                                                    <button class="btn btn-success increment"><i
                                                            class="fal fa-plus"></i></button>
                                                </div>
                                            </td>

                                            <td class="fp__pro_tk">
                                                <h6 class="product_cart_total">
                                                    {{ currencyPosition(productTotal($product->rowId)) }}</h6>
                                            </td>

                                            <td class="fp__pro_icon">
                                                <a href="#" class="remove_cart_product"
                                                    data-id="{{ $product->rowId }}"><i class="far fa-times"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (Cart::content()->count() === 0)
                                        <tr>
                                            <td colspan="6" class="text-center" style="width: 100%; display: inline;">Giỏ
                                                hàng trống</td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__cart_list_footer_button">
                        <h6>Giỏ Hàng</h6>
                        <p>Tổng Tiền: <span id="subtotal"> {{ currencyPosition(cartTotal()) }} </span></p>
                        <p>Phí Vận Chuyển: <span>00.00 {{ config('settings.site_currency_icon') }} </span></p>
                        <p>Giảm Giá: <span id="discount">
                            @if (isset(session()->get('coupon')['discount']))
                                 {{ session()->get('coupon')['discount'] }} {{ config('settings.site_currency_icon') }}
                            @else
                                0 {{ config('settings.site_currency_icon') }}
                            @endif
                        </span></p>
                        <p class="total"><span>Thành Tiền:</span> <span id="final_total">
                            @if (isset(session()->get('coupon')['discount']))
                                {{ cartTotal() - session()->get('coupon')['discount'] }} {{ config('settings.site_currency_icon') }}
                            @else
                                {{ cartTotal() }} {{ config('settings.site_currency_icon') }}
                            @endif
                        </span></p>
                        
                        <form id="coupon_form">
                            <input type="text" id="coupon_code" name="code" placeholder="Mã Giảm Giá">
                            <button type="submit">Sử Dụng</button>
                        </form>
                
                        <div class="coupon_card">
                            @if (session()->has('coupon'))
                            <div class="card mt-2">
                                <div class="m-3">
                                    <span><b class="v_coupon_code">Phiếu giảm giá được áp dụng: {{ session()->get('coupon')['code'] }}</b></span>
                                    <span>
                                        <button id="destroy_coupon"> <i class="far fa-times"></i></button>
                                    </span>
                                </div>
                            </div>
                            @endif
                        </div>
                
                        <style>
                            .fp__cart_list_footer_button {
                                /* Đảm bảo định dạng của khung bao quanh nút "Thanh Toán" */
                                border: 1px solid #ccc;
                                padding: 10px;
                                text-align: center;
                            }
                
                            .link-button {
                                background: none;
                                border: none;
                                padding: 0;
                                color: inherit;
                                cursor: pointer;
                                text-decoration: underline;
                                font: inherit;
                                white-space: nowrap; /* Đảm bảo không xuống hàng */
                            }
                        </style>
                
                        <form action={{ url('/vnpay_payment') }} method="POST" style="display: inline;">
                            @csrf 
                            <input type="hidden" name="total" value="{{ cartTotal() }}">
                            <button name="redirect" style="margin-top: 20px" type="submit" class="link-button common_btn">
                                Thanh Toán
                            </button>
                        </form>
                    </div>
                </div>
                

            </div>
        </div>
    </section>
    <!--============================
                                    CART VIEW END
                                ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var cartTotal = parseInt("{{ cartTotal() }}");


            $('.increment').on('click', function() {
                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");
                inputField.val(currentValue + 1);


                cartQtyUpdate(rowId, inputField.val(), function(response) {
                    if (response.status === 'success') {
                        inputField.val(response.qty);
                        let productTotal = response.product_total;
                        console.log($(this));
                        inputField.closest("tr")
                            .find(".product_cart_total")
                            .text("{{ currencyPosition(':productTotal') }}"
                                .replace(":productTotal", productTotal));

                        cartTotal = response.cart_total;
                        $('#subtotal').text(
                            cartTotal + "{{ config('settings.site_currency_icon') }}" );
                        $("#final_total").text(
                            response.grand_cart_total + "{{ config('settings.site_currency_icon') }}" );


                    } else if (response.status === 'error') {
                        inputField.val(response.qty);
                        toastr.error(response.message);
                    }
                });
            });

            $('.decrement').on('click', function() {


                let inputField = $(this).siblings(".quantity");
                let currentValue = parseInt(inputField.val());
                let rowId = inputField.data("id");
                if (currentValue > 1) {
                    inputField.val(currentValue - 1);

                }

                if (inputField.val() > 1) {
                    cartQtyUpdate(rowId, inputField.val(), function(response) {
                        if (response.status === 'success') {
                            inputField.val(response.qty);
                            let productTotal = response.product_total;
                            console.log($(this));
                            inputField.closest("tr")
                                .find(".product_cart_total")
                                .text("{{ currencyPosition(':productTotal') }}"
                                    .replace(":productTotal", productTotal));

                            cartTotal = response.cart_total;
                            $('#subtotal').text(
                                cartTotal + "{{ config('settings.site_currency_icon') }}" );

                        } else if (response.status === 'error') {
                            inputField.val(response.qty);
                            toastr.error(response.message);
                        }
                    });
                }

            })



            function cartQtyUpdate(rowId, qty, callback) {
                $.ajax({
                    method: 'post',
                    url: '{{ route('cart.quantity-update') }}',
                    data: {
                        'rowId': rowId,
                        'qty': qty,
                    },
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        if (callback && typeof callback === 'function') {
                            callback(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }

            $('.remove_cart_product').on('click', function(e) {
                e.preventDefault();
                let rowId = $(this).data('id');
                removeCartProduct(rowId);
                $(this).closest('tr').remove();
            })


            function removeCartProduct(rowId) {
                $.ajax({
                    method: 'get',
                    url: '{{ route('cart-product-remove', ':rowId') }}'.replace(":rowId", rowId),

                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        updateSidebarCart();

                        cartTotal = response.cart_total;
                        $('#subtotal').text(cartTotal + "{{ config('settings.site_currency_icon') }}");
                        $("#final_total").text(response +"{{ config('settings.site_currency_icon') }}"
                            .grand_cart_total)
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader();
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }



            $('#coupon_form').on('submit', function(e) {
                e.preventDefault();
                let code = $("#coupon_code").val();
                let subtotal = cartTotal;
                couponApply(code, subtotal);
            })




            function couponApply(code, subtotal) {
                $.ajax({
                    method: 'POST',
                    url: '{{ route('apply-coupon') }}',
                    data: {
                        code: code,
                        subtotal: subtotal
                    },
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(response) {
                        $("#coupon_code").val("");
                        $('#discount').text(  response
                            .discount + "{{ config('settings.site_currency_icon') }}");
                        $('#final_total').text( response
                            .finalTotal + "{{ config('settings.site_currency_icon') }}");
                        $couponCartHtml = `<div class="card mt-2">
                            <div class="m-3">
                                <span><b class="v_coupon_code">Applied Couppon: ${response.coupon_code}</b></span>
                                <span>
                                    <button id="destroy_coupon"><i class="far fa-times"></i></button>
                                </span>
                            </div>
                        </div>`
                        $('.coupon_card').html($couponCartHtml);
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader()

                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader()
                    }
                })
            }

            $(document).on('click', "#destroy_coupon", function() {
                destroyCoupon();
            });

            function destroyCoupon() {
                $.ajax({
                    method: 'GET',
                    url: '{{ route('destroy-coupon') }}',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(response) {
                        $('#discount').text( 0 +"{{ config('settings.site_currency_icon') }}");
                        $("#final_total").text( response + "{{ config('settings.site_currency_icon') }}"
                            .grand_cart_total);
                        $('.coupon_card').html("");

                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        hideLoader()

                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        hideLoader();
                    }
                })
            }
        })
    </script>
@endpush
