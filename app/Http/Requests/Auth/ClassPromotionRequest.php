<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ClassPromotionRequest extends FormRequest
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
        return [

            'from_class_name' => [
                'required'
            ],

            'from_programme_name' => [
                'required'
            ],

            'from_year_name' => [
                'required'
            ],

            'to_class_name' => [
                'required'
            ],

            'to_programme_name' => [
                'required'
            ],

            'to_year_name' => [
                'required'
            ],
        ];
    }
}
