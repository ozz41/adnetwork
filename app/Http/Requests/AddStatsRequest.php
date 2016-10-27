<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStatsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'date_format:Y-m-d|required',
            'site' => 'string|present',
            'impressions' => 'string|present',
            'served' => 'string|present',
            'fill' => 'string|present',
            'income' => 'string|present',
            'ecpm' => 'string|present',
            'tag' => 'string|present',
        ];
    }
}