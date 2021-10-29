<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewAddRequest extends FormRequest
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
            'name' => ['required', 'alpha', 'max:30'],
            'surname' => ['sometimes', 'string', 'nullable', 'max:30'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'comment' => ['string', 'min:5', 'max:5000'],
            'file' => ['sometimes', 'max:100000'],
            'checkbox' => ['required'],
        ];
    }

    public function attributes(): array
    {
        return [
            'surname' => 'фамилия',
            'file' => 'файл',
            'comment' => 'комментарии'
        ];
    }
}
