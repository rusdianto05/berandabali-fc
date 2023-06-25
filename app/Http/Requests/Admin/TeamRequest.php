<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
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
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'born_place' => 'required|string|max:255',
                'born_date' => 'required|date',
                'height' => 'required|integer',
                'weight' => 'required|integer',
                'joined_date' => 'required|date',
                'number' => 'required|integer',
                'goal' => 'nullable|integer',
                'assist' => 'nullable|integer',
                'apperances' => 'nullable|integer',
                'clean_sheet' => 'nullable|integer',
                'saves' => 'nullable|integer',

            ],
            'PUT', 'PATCH' => [
                'name' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'born_place' => 'required|string|max:255',
                'born_date' => 'required|date',
                'height' => 'required|integer',
                'weight' => 'required|integer',
                'joined_date' => 'required|date',
                'number' => 'required|integer',
                'goal' => 'nullable|integer',
                'assist' => 'nullable|integer',
                'apperances' => 'nullable|integer',
                'clean_sheet' => 'nullable|integer',
                'saves' => 'nullable|integer',
            ],
            default => [],
        };
    }
}
