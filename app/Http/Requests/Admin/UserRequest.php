<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'phone' => ['required', 'numeric', 'unique:users,phone'],
                'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ],
            'PUT', 'PATCH' => [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'phone' => ['required', 'numeric', 'unique:users,phone,' . $this->user->id],
                'avatar' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ],
            default => [],
        };
    }
}
