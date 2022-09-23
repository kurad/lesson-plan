<?php

namespace App\Services;

use App\DTO\Lesson\CreateLessonDto;
use App\DTO\Lesson\UpdateLessonDto;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\UknownException;
use App\Models\Lesson;
use App\Models\Unit;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class LessonService extends AbstractService
{



    /**
     * @throws Exception
     */
    public function createLesson(CreateLessonDto $data): Lesson
    {

        $title = $data->title;
        $unitId = $data->unitId;
        $topicArea = $data->topicArea;
        $duration = $data->duration;
        $date =  $data->lessonDate;
        $instructions = $data->instructions;
        $knowledge = $data->knowledge;
        $skills = $data->skills;
        $attitudes = $data->attitudes;
        $materials = $data->materials;
        $description = $data->description;
        $reference = $data->reference;


        $unit = Unit::find($unitId);
        if (is_null($unit)) {
            throw new ItemNotFoundException("The unit does not exist");
        }
        try {
            $lesson = Lesson::create([
                "title" => $title,
                "unit_id" => $unit->id,
                "topic_area" => $topicArea,
                "duration" => $duration,
                "date" => $date,
                "instructional_objective" => $instructions,
                "knowledge_and_understanding" => $knowledge,
                "skills" => $skills,
                "attitudes_and_values" => $attitudes,
                "teaching_materials" => $materials,
                "description_of_teaching" => $description,
                "reference" => $reference,

            ]);

            return $lesson;
        } catch (Exception $th) {

            Log::error("Failed to create Lesson ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);

            throw new UknownException("Sorry, there were some issues, contact the system admin");
        }
    }

    public function getLesson(int $id): ?Lesson
    {
        $lesson = Lesson::find($id);
        if (is_null($lesson)) {
            throw new ItemNotFoundException("Sorry, Lesson can not be found");
        }
        return $lesson;
    }

    public function allLessons(): Collection
    {
        $lessons = Lesson::with('unit')->get();

        return $lessons;
    }

    public function lessonsPerUnit(int $unitId): Collection
    {
        $lessons = Lesson::where("unit_id", "=", $unitId)->get();
        return $lessons;
    }


    public function updateLesson(UpdateLessonDto $data, int $id): Lesson
    {
        $lesson = Lesson::find($id);
        if (is_null($lesson)) {
            throw new ItemNotFoundException("The Lesson does not exist");
        }

        $title = $data->lessonTitle;
        $unitId = $data->unitId;
        $topic_area = $data->topicArea;
        $duration = $data->duration;
        $date = $data->lessonDate;
        $objective = $data->instructionalObjective;
        $knowledge = $data->knowledge;
        $skills = $data->skills;
        $attitudes = $data->attitudeValues;
        $materials = $data->teachingMaterial;
        $description = $data->description;
        $reference = $data->reference;


        try {
            $lesson->update([
                "title" => $title,
                "unit_id" => $unitId,
                "topic_area" => $topic_area,
                "duration" => $duration,
                "date" => $date,
                "instructional_objective" => $objective,
                "knowledge_and_understanding" => $knowledge,
                "skills" => $skills,
                "attitudes_and_values" => $attitudes,
                "teaching_materials" => $materials,
                "description_of_teaching" => $description,
                "reference" => $reference,
            ]);

            return $lesson;
        } catch (Exception $th) {

            Log::error("Failed to update Lesson ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new UknownException("Sorry, there were some issues, contact the system admin");
        }
    }
    public function destroyLesson(int $id): bool
    {
        $lesson = Lesson::find($id);
        if (is_null($lesson)) {
            throw new ItemNotFoundException("The Lesson does not exist");
        }

        return $lesson->delete();
    }
}