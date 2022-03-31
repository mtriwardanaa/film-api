<?php

namespace Modules\Movie\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateMovie extends FormRequest
{
    public function rules()
    {
        return [
            "movie_id" => "required|string",
            "categories" => "|sometimes|required|array",
            "genres" => "|sometimes|required|array",
            "countries" => "|sometimes|required|array",
            "actors" => "|sometimes|required|array",
            "directors" => "nullable|array",
            "tags" => "nullable|array",
            "title" => "required|string|min:3",
            "cover" => "required|string",
            "trailer" => "sometimes|nullable|string",
            "source" => "sometimes|nullable|string",
            "desc" => "required|string",
            "duration" => "required|integer",
            "quality" => "required|string|min:2",
            "release_date" => "required|date",
            "rating" => "nullable",
            "coming_soon" => "nullable|integer|in:0,1"
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
