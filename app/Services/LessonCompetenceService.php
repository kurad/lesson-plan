<?php

namespace App\Services;

use App\DTO\LessonCompetence\CreateLessonCompetenceDto;
use App\Exceptions\InvalidDataGivenException;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\UknownException;
use App\Models\LessonPart;
use App\Models\LessonPartCompetence;
use App\Models\LessonPartEvaluation;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class LessonCompetenceService extends AbstractService
{



    /**
     * @throws Exception
     */
    public function createLessonCompetence(CreateLessonCompetenceDto $data): LessonPartCompetence
    {

        $content = $data->content;
        $lessonPartId = $data->lessonPartId;


        $lesson = LessonPartEvaluation::find($lessonPartId);
        if (is_null($lesson)) {
            throw new ItemNotFoundException("There is no such lesson part found");
        }

        try {
            $lesson = LessonPartEvaluation::create([
                "content" => $content,
                "lesson_part_id" => $lessonPartId,

            ]);

            return $lesson;
        } catch (Exception $th) {
            Log::error("Failed to create a lesson Evaluation ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new UknownException("Sorry, there were some issues, contact the system admin");
        }
    }

    public function getLessonEvaluation(int $id): ?LessonPartEvaluation
    {
        $evaluation = LessonPartEvaluation::find($id);
        if (is_null($evaluation)) {
            throw new ItemNotFoundException("Sorry, lesson part can not be found");
        }
        return $evaluation;
    }

    public function allEvaluation(): Collection
    {
        $evaluations = LessonPartEvaluation::all();

        return $evaluations;
    }

    public function evaluationPerLesson(int $lessonId): Collection
    {
        $evaluation = LessonPartEvaluation::join('lesson_parts', 'lesson_parts.id', '=', 'lesson_part_evaluations.lesson_part_id')
            ->join('lessons', 'lessons.id', '=', 'lesson_parts.lesson_id')
            ->where("lesson_id", "=", $lessonId)->get();
        return $evaluation;
    }


    public function updateLessonEvaluation(UpdateLessonEvaluationDto $data, int $id): LessonPartEvaluation
    {
        $evaluation = LessonPartEvaluation::find($id);
        if (is_null($evaluation)) {
            throw new InvalidDataGivenException("The lesson evaluation does not exist");
        }

        $content = $data->type;
        $lessonPartId = $data->lessonPartId;

        try {
            $evaluation->update([
                "content" => $content,
                "lesson_part_id" => $lessonPartId,
            ]);

            return $evaluation;
        } catch (Exception $th) {

            Log::error("Failed to update lesson part ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new UknownException("Sorry, there were some issues, contact the system admin");
        }
    }

    public function destroyLessonEvaluation(int $id): bool
    {
        $evaluation = LessonPartEvaluation::find($id);
        if (is_null($evaluation)) {
            throw new InvalidDataGivenException("The lesson Part does not exist");
        }

        return $evaluation->delete();
    }
}
