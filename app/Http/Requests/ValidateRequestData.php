<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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

        if($this->method('POST')){
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
                    ['required', Password::defaults()],
                ],
                'cpf' => [
                    'unique:users,cpf,{$id},id',
                    'min:11'
                ],
            ];
        }

        return $rules;
    }
}
