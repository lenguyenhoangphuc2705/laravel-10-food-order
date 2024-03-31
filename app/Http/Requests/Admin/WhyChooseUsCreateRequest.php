<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WhyChooseUsCreateRequest extends FormRequest
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
            'icon' => ['required', 'max:50'],
            'title' => ['required', 'max:255'],
            'short_description' => ['required', 'max:500'],
            'status' => ['required', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'=>'Tiêu đề không được để trống',
            'title.max'=>'Tiêu đề không được nhập quá 255 ký tự',
            'short_description.required'=>'Mô tả ngắn không được để trống',
            'short_description.max'=>'Mô tả ngắn không được quá 255 ký tự'

        ];
    }

}
