<?php

namespace App\Services;

use App\DTO\LessonParts\CreateLessonPartDto;
use App\DTO\LessonParts\UpdateLessonPartDto;
use App\Exceptions\InvalidDataGivenException;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\UknownException;
use App\Models\Lesson;
use App\Models\LessonPart;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class LessonPartService extends AbstractService
{



    /**
     * @throws Exception
     */
    public function createLessonPart(CreateLessonPartDto $data): LessonPart
    {

        $ytpe = $data->type;
        $duration = $data->duration;
        $lessonId = $data->lessonId;


        $lesson = Lesson::find($lessonId);
        if (is_null($lesson)) {
            throw new ItemNotFoundException("There is no such lesson found");
        }

        try {
            $lessonPart = LessonPart::create([
                "type" => $ytpe,
                "duration" => $duration,
                "lessonId" => $lessonId,

            ]);

            return $lessonPart;
        } catch (Exception $th) {
            Log::error("Failed to create a lesson Part ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new UknownException("Sorry, there were some issues, contact the system admin");
        }
    }

    public function getLessonPart(int $id): ?LessonPart
    {
        $lessonPart = LessonPart::find($id);
        if (is_null($lessonPart)) {
            throw new ItemNotFoundException("Sorry, lesson part can not be found");
        }
        return $lessonPart;
    }

    public function allLessonParts(): Collection
    {
        $lessonParts = LessonPart::all();

        return $lessonParts;
    }

    // public function unitsPerSubject(int $subjectId): Collection
    // {
    //     $units = Unit::where("subject_id", "=", $subjectId)->get();
    //     return $units;
    // }


    public function updateLessonPart(UpdateLessonPartDto $data, int $id): LessonPart
    {
        $lessonPart = LessonPart::find($id);
        if (is_null($lessonPart)) {
            throw new InvalidDataGivenException("The lesson part does not exist");
        }

        $ytpe = $data->type;
        $duration = $data->duration;
        $lessonId = $data->lessonId;

        try {
            $lessonPart->update([
                "type" => $ytpe,
                "duration" => $duration,
                "lessonId" => $lessonId,
            ]);

            return $lessonPart;
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

    public function destroyLessonPart(int $id): bool
    {
        $lessonPart = LessonPart::find($id);
        if (is_null($lessonPart)) {
            throw new InvalidDataGivenException("The lesson Part does not exist");
        }

        return $lessonPart->delete();
    }
}