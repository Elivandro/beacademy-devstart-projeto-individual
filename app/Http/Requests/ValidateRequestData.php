<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRequestData extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->id ?? '';

        $rules = [
            'name' => [
                'string',
                'min:3',
                'max:50'
            ],
            'email' => [
                'email',
                'unique:users,email,{$id},id'
            ],
            'password' => [
                'min:4',
                'max:12'
            ],
            'cpf' => [
                'unique:users,cpf,{$id},id',
                'min:11'
            ],
            'image' => [
                'file',
                'mimes:jpeg,jpg,png'
            ],
        ];

        if($this->method('PUT')){
            $rules['image'] = [
                'file',
                'mimes:jpeg,jpg,png'
            ];
        }

        return $rules;
    }
}
