<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'unique:categories,name,'.$this->category],
            'show_at_home' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=> 'Tên không được để trống',
            'name.max'=> 'Tên không được dài quá 255 ký tự',
            'name.unique'=> 'Tên danh mục đã tồn tại',
        ];
    }
}
