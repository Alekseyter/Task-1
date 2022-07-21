<?php

namespace App\Http\Requests\Fertilizers;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'name' => 'nullable',
            'nitrogen' => 'nullable|array',
            'phosphorus' => 'nullable|array',
            'potassium' => 'nullable|array',
            'culture_id' => 'nullable|array',
            'district' => 'nullable|array',
            'price' => 'nullable|array',
            'description' => 'nullable',
            'target' => 'nullable',
        ];
    }
}
