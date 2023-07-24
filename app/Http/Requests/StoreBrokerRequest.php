<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrokerRequest extends FormRequest
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
            'name'=>['required','unique:brokers'],
            'address'=>['required'],
            'city'=>['required'],
            'zip_code'=>['required'],
            'phone_number'=>['required','numeric','digits:11'],
            'image_path'=>['required']
        ];
    }
}
