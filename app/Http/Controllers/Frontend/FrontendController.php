<?php

namespace App\Http\Controllers\Frontend;

use App\Models\SectionTitle;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\Response;
use App\Models\Coupon;

class FrontendController extends Controller
{
    function index(): View{
        $sectionTitle = $this->getSectionTitles();

        $slider = Slider::where('status', 1)->get();
        $whyChooseUs= WhyChooseUs::where('status', 1)-> get();
        $categories= Category::where(['show_at_home' => 1, 'status'=>1])->get();

        return view('frontend.home.index',
            compact(
              'slider',
              'sectionTitle',
              'whyChooseUs',
              'categories'
            ));
    }

    function getSectionTitles(): Collection {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title'
        ];
        return SectionTitle::whereIn('key', $keys)->pluck('value','key');
    }

    function showProduct(string $slug): View {
        $product = Product::with(['productImages','productSizes','productOptions'])->where(['slug'=> $slug,
        'status'=>1])->firstOrFail();
        $relateProducts = Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)->take(8)->latest()->get();
        return view('frontend.pages.product-view', compact('product','relateProducts'));
    }
    function loadProductModal($productId){
        $product = Product::with(['productSizes','productOptions'])->findOrFail($productId);
        return view('frontend.layouts.ajax-files.product-popup-modal', compact('product'))->render();
    }

    function applyCoupon(Request $request){
        $subtotal = $request->subtotal;
        $code = $request->code;

        $coupon = Coupon::where('code', $code)->first();

        if(!$coupon) {
            return response(['message' => 'Invalid Coupon Code.'], 422);
        }
        if($coupon->quantity <= 0){
            return response(['message' => 'Coupon has been fully redeemed.'], 422);
        }
        if($coupon->expire_date < now()){
            return response(['message' => 'Coupon hs expired.'], 422);
        }


if($coupon->discount_type === 'percent') {
     $discount =$subtotal * ($coupon->discount /100);
}
 elseif ($coupon->discount_type === 'amount'){
    $discount= $coupon->discount;
}

$finalTotal = $subtotal - $discount;
return response(['message'=>'Coupon Applied Successfully.', 'discount'=> $discount, 'finalTotal'=> $finalTotal]);

    }

}
