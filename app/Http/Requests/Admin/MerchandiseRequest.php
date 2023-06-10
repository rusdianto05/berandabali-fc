<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MerchandiseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return match ($this->method()) {
            'POST' => [
                'category_merchandise_id' => ['required', 'exists:category_merchandises,id'],
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'],
                'description' => ['required', 'string'],
                'link_marketplace' => ['required', 'string', 'max:255'],
                'image' => ['required']
            ],
            'PUT', 'PATCH' => [
                'category_merchandise_id' => ['required', 'exists:category_merchandises,id'],
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'],
                'description' => ['required', 'string'],
                'link_marketplace' => ['required', 'string', 'max:255'],
                'image' => ['nullable']
            ],
        };
    }
}
