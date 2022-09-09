<?php

namespace App\Http\Requests\Subject;

use App\DTO\Subject\CreateSubjectDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateSubjectRequest extends FormRequest
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
            "subjectName" => "required|string",
            "classId" => "required|integer",
            "userId" => "required|integer",

        ];
    }
    public function passedValidation()
    {
        $this->dto = new CreateSubjectDto($this->validated());
    }
}