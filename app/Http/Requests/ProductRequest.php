<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products|max:255|min:5',
            'price'=> 'required',
            'category_id' => 'required',
            'contents' =>'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' =>'Tên không được trùng',
            'name.max' => 'Tên không quá 255 kí tự',
            'name.min' => 'Tên không nhỏ hơn 5 kí tự',
            'price.required' =>'Giá không được để trống',
            'category_id.required'=>'Danh mục không được để trống',
            'contents.required'=>'Nội dung không được để trống'
        ];
    }
}
