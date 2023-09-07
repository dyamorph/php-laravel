<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Http\Request;

class ProductStoreRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
            'release_date' => 'required|date',
            'price' => 'required',
        ];
    }
}
