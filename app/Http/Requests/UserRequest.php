<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required',
            'status' => 'required|in:active,inactive',
        ];

        if($this->method() == 'POST'){
            $rules['email'] = 'required|email|unique:users,email';
            $rules['phone'] = 'required|digits:10|unique:users,phone';
            $rules['password'] = 'required|confirmed|min:6';
        }else{
            $rules['email'] = 'required|email|unique:users,email,'.$this->user->id;
            $rules['phone'] = 'required|digits:10|unique:users,phone,'.$this->user->id;
            $rules['password'] = 'nullable|min:6';
        }

        return $rules;
    }
}
