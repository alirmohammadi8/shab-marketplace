<?php

namespace Shab\Marketplace\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name'           => ['required', 'max:255', 'string'],
            'price'          => ['required', 'numeric'],
            'shipping_price' => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        $product = $this->route('product');
        return $product && $this->user()->id === $product->user_id;
    }
}
