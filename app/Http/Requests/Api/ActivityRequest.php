<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
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
        return [
            // 'type' => 'required|in:FREE,HALTE,MAPS',
            'mode' => 'required|in:WALK,RUN,BIKE',
            'range' => 'required',
            'duration'=> 'required',
            'calory'	=> 'required',
            'location' => 'required',
            'start_at' => 'required',
            'location' => 'required',
            'pace' => 'required',
            'step' => 'required',
            'history_routes'=> 'required',
            'station_destination_id' => 'required_if:type,HALTE',
            'start_location' => 'nullable',
            'start_lat' => 'nullable',
            'start_long' => 'nullable',
            'finish_location' => 'nullable',
            'finish_lat' => 'nullable',
            'finish_long' => 'nullable',
            'route' => 'nullable',

        ];
    }
}
