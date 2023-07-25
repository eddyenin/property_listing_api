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
            'name'=>[$this->isPost(),'unique:brokers'],
            'address'=>[$this->isPost()],
            'city'=>[$this->isPost()],
            'zip_code'=>[$this->isPost()],
            'phone_number'=>[$this->isPost(),'numeric','digits:11'],
            'image_path'=>[$this->isPost()]
        ];
    }

    public function isPost(){
        return request()->isMethod('post') ? 'required' : 'sometimes';
    }
}
