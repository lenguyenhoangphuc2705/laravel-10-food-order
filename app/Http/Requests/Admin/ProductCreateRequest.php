<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'offer_price' => ['nullable', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'short_description' => ['required', 'max:500'],
            'long_description' => ['required'],
            'sku' => ['nullable', 'max:255'],
            'seo_title' => ['nullable', 'max:255'],
            'seo_description' => ['nullable', 'max:255'],
            'show_at_home' => ['boolean'],
            'status' => ['required','boolean']
        ];
    }


    public function messages(): array
    {
        return [
            'name.required'=> 'Tên không được để trống',
            'name.max'=> 'Tên không được dài quá 255 ký tự',
            'category.required'=> 'Danh mục không được trống',
            'category.integer'=> 'Hãy nhập số nguyên',
            'price.required'=> 'Hãy nhập giá',
            'price.numeric'=> 'Số tiền nhập không hợp lệ',
            'price.min'=> 'Số tiền nhập không hợp lệ',
            'offer_price.required'=> 'Hãy nhập giá ưu đãi',
            'offer_price.numeric'=> 'Số tiền nhập không hợp lệ',
            'short_description.required'=>'Mô tả ngắn không được để trống',
            'short_description.max'=>'Mô tả ngắn không được quá 500 ký tự',
            'long_description.required'=>'Mô tả dài không được để trống',
            'sku.max'=> 'Mã hàng hóa không được dài quá 255 ký tự',
            'seo_title.max'=> 'Tiêu đề không được dài quá 255 ký tự',
            'seo_description.max'=>'Mô tả không được dài quá 255 ký tự',

        ];
    }
}
