<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamMatchRequest extends FormRequest
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
        return match ($this->method) {
            'POST' => [
                'opponent_name' => 'required|string|max:255',
                'opponent_logo' => 'required|image',
                'match_date' => 'required|date',
                'match_location' => 'required|string|max:255',
                'team_score' => 'nullable|integer',
                'opponent_score' => 'nullable|integer',
                'status' => 'required|string|max:255',
            ],
            'PUT', 'PATCH' => [
                'opponent_name' => 'required|string|max:255',
                'opponent_logo' => 'nullable|image',
                'match_date' => 'required|date',
                'match_location' => 'required|string|max:255',
                'team_score' => 'required|if:status,==,finished|integer',
                'opponent_score' => 'required|if:status,==,finished|integer',
                'status' => 'required|string|max:255',
            ],
            default => [],
        };
    }
}
