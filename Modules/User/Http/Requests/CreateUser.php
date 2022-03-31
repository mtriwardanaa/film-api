<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUser extends FormRequest
{
    public function rules()
    {
        return [
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "username" => "required|string|unique:users,username",
            "password" => "required|string|min:4|confirmed",
            "password_confirmation" => "required|string|min:4",
            "level" => "required|in:admin,user",
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['status' => 'fail', 'messages'  => $validator->errors()->all()], 200));
    }

    protected function validate()
    {
        return $this->json()->all();
    }
}
