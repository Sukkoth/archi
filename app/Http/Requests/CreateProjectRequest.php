<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'title' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'description' => 'required|string',
            'size'=> 'nullable|numeric',
            'startDate' => 'nullable|date',
            'endDate' => 'nullable|date',
            'status' => 'required|string|max:100',
            'location' => 'required|string|max:100',
        ];
    }
}

