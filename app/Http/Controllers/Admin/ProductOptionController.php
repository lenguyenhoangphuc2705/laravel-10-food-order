<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOption;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductOptionController extends Controller
{

    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'product_id' => ['required', 'integer']
        ],[
            'name.required' => 'Tên tùy chọn sản phẩm không được để trống',
            'name.max' => 'Tên tùy chọn sản phẩm không dài quá 255 ký tự',
            'price.required' => 'Giá tùy chọn sản phẩm không được để trống',
            'price.numeric' => 'Giá tùy chọn sản phẩm không hợp lệ',
        ]);

        $option = new ProductOption();
        $option->product_id = $request->product_id;
        $option->name = $request->name;
        $option->price = $request->price;
        $option->save();

        toastr()->success('Thêm thành công!');

        return redirect()->back();

    }



    public function destroy(string $id): Response
    {
        try{
            $image = ProductOption::findOrFail($id);
            $image->delete();

            return response(['status' => 'success', 'message' => 'Xóa thành công!']);
        }catch(\Exception $e){
            return response(['status' => 'error', 'message' => 'Đã xảy ra sự cố!']);
        }
    }
}
