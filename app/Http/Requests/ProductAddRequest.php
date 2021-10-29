<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'brand_id' => ['required', 'integer', 'max:20'],
            'code' => ['required', 'string', 'max:20'],

//            'description' => ['string'],
//            'details' => ['string'],
//            'function' => ['string'],
//            'form' => ['string'],
//            'amount' => ['string'],
            'image' => ['sometimes', 'max:10000', 'mimes:png,jpeg,jpg,svg,bmp'],

            'price' => ['required', 'string', 'min:1', 'max:10'],
            'availability' => ['required', 'boolean'],
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => 'код товара',
            'price' => 'цена',
            'name' => 'наименование товара',
            'image' => 'изображение',
            'using' => 'дозировка',
        ];
    }
}
