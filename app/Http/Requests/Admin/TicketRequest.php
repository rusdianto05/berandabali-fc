<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
                'team_match_id' => ['required', 'exists:team_matches,id'],
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'],
                'quantity' => ['required', 'numeric'],
                'image' => ['required', 'image', 'max:2048'],
                'is_active' => ['required', 'boolean'],
            ],
            'PUT', 'PATCH' => [
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'numeric'],
                'quantity' => ['required', 'numeric'],
                'image' => ['nullable', 'image', 'max:2048'],
                'is_active' => ['required', 'boolean'],
            ],
            default => [],
        };
    }
}
