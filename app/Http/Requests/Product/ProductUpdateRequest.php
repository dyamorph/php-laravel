<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Http\Request;

class ProductUpdateRequest extends Request
{
    public function authorize(): bool
    {
        return false;
    }

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
