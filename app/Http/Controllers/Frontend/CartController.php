<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CartController extends Controller
{

    function index() : View {
        return view('frontend.pages.cart-view');
    }

    //Add product to cart
    function addToCart(Request $request)
    {
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($request->product_id);
        if($product->quantity < $request->quantity){
            throw ValidationException::withMessages(['Số lượng không tồn tại!']);
        }
        try {
            $productSize = $product->productSizes->where('id', $request->product_size)->first();
            $productOptions = $product->productOptions->whereIn('id', $request->product_option);



            $options = [
                'product_size' => [],
                'product_option' => [],
                'product_info' => [
                    'image' => $product->thumb_image,
                    'slug' => $product->slug,

                ]
            ];

            if ($productSize !== null) {
                $options['product_size'] = [
                    'id' => $productSize?->id,
                    'name' => $productSize?->name,
                    'price' => $productSize?->price
                ];
            }

            foreach ($productOptions as $option) {
                $options['product_options'][] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'price' => $option->price
                ];
            }

            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->offer_price,
                'weight' => 0,
                'options' => $options,
            ]);

            return response(['status' => 'success', 'message' => 'Sản phẩm đã được thêm vào giỏ hàng!'], 200);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => 'Có gì đó không ổn!'], 500);
        }
    }

    function getCartProduct() {

        return view('frontend.layouts.ajax-files.sidebar-cart-item')->render();
    }
    function cartProductRemove($rowId){
        try{
            Cart::remove($rowId);

            return response([
                 'status' => 'success',
                 'message' => 'Sản phẩm đã được loại khỏi giỏ hàng',
                 'cart_total'=>cartTotal(),
                 'grand_cart_total'=> grandCartTotal()
                ], 200);
        }catch(\Exception $e){

            return response(['status' => 'error', 'message' => 'Xin lỗi có gì đó không ổn'], 500);
        }
    }

    function cartQtyUpdate(Request $request){

        $cartItem = Cart::get($request->rowId);
        $product = Product::findOrFail($cartItem->id);

        if($product->quantity < $request->qty){
            return response(['status' => 'error', 'message' => 'Số lượng không tồn tại!', 'qty' => $cartItem->qty]);
        }
        try{
            $cart=Cart::update($request->rowId, $request ->qty);
            return response([
                'status'=>'success',
                'product_total' => productTotal($request->rowId),
                'qty'=> $cart->qty,
                'cart_total'=> cartTotal(),
                'grand_cart_total'=> grandCartTotal()
            ],200);

        }catch(\Exception $e){
            logger($e);
            return response(['status' => 'error', 'message' => 'Cập nhật số lượng thất bại'], 500);
        }

    }

    function cartDestroy(){
        Cart::destroy();
        session()->forget('coupon');
        return redirect()->back();
    }
}
