<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        return [
            'name'=>'required|max:256',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:4'
        ];
    }

    public function getData()
    {
        $data=$this->validated();
        $data['password']=bcrypt($data['password']);
        return $data;
    }
}
