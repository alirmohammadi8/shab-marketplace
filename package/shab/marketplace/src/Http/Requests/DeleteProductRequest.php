<?php

namespace Shab\Marketplace\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteProductRequest extends FormRequest
{

    public function rules(): array
    {
        return [

        ];
    }

    public function authorize(): bool
    {
        $product = $this->route('product');
        return $product && $this->user()->id === $product->user_id;
    }
}
