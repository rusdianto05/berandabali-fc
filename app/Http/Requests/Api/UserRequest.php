<?php

namespace App\Http\Requests\Api;

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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return match (request()->method()) {
            'POST' => $this->store(),
            'PUT' => $this->update()
        };
    }

    public function store()
    {
        return [
            'name' => 'nullable',
            'bio' => 'nullable',
            'gender' => 'nullable|in:L,P',
            'weight' => 'required',
            'height' => 'required',
            'birth_date' => 'required|date_format:Y-m-d',
        ];
    }
}
