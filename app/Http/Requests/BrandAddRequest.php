<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandAddRequest extends FormRequest
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
            'name' => ['required', 'string', ' min:1', 'max:200'],
            'title' => ['required', 'string', ' min:1', 'max:500'],
            'description' => ['required', 'string', ' min:1', 'max:500'],
            'image' => ['sometimes'],
            'presentation' => ['sometimes'],
            'country' => ['required', 'string',' min:1', 'max:50']
        ];
    }
}
