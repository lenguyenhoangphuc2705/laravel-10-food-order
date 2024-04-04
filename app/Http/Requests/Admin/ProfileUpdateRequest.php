<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'avatar'=> ['nullable','image', 'max:3000'],
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:200', 'unique:users,email,'.auth()->user()->id]
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=> 'Tên không được để trống',
            'name.max'=> 'Tên không được dài quá 50 ký tự',
            'name.unique'=> 'Tên danh mục đã tồn tại',
            'email.required'=> 'Email không được để trống',
            'email.max'=> 'Email không được dài quá 200 ký tự',
            'email.unique'=> 'Email đã tồn tại',
        ];
    }
}
