<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'numeric|nullable',
            'price' => 'required|numeric|min:0',
            'discounted_price' => 'required|numeric|min:0',
            'featured_image' => 'required|image',
            'others_images.*' => 'image|nullable',
            'product_size.*' => 'required',
        ];
    }
}