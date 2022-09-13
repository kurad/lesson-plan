<?php

namespace App\Http\Requests\LearnerActivities;

use App\DTO\LessonStudentActivities\CreateLessonStudentActivitiesDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateLearnerActivityRequest extends FormRequest
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
            "content" => "required|string",
            "lessonPartId" => "required|integer",
        ];
    }

    public function passedValidation()
    {
        $this->dto = new CreateLessonStudentActivitiesDto($this->validated());
    }
}
