<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $productId) : View
    {
        $product = Product::findOrFail($productId);
        $sizes = ProductSize::where('product_id', $product->id)->get();
        $options = ProductOption::where('product_id', $product->id)->get();
          return view('admin.product.product-size.index', compact('product','sizes','options'));
    }


    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_id' => ['required', 'integer']
        ]);

        $size = new ProductSize();
        $size->product_id = $request->product_id;
        $size->name = $request->name;
        $size->price = $request->price;
        $size->save();

        toastr()->success('Thêm mới thành công!');

        return redirect()->back();

    }
    public function destroy(string $id):Response
    {
        try{
            $image = ProductSize::findOrFail($id);
            $image->delete();

            return response(['status' => 'success', 'message' => 'Xóa thành công!']);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => 'Đã xảy ra sự cố!']);
        }
    }
}
