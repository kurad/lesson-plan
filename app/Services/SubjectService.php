<?php

namespace App\Services;

use App\DTO\Subject\CreateSubjectDto;
use App\DTO\Subject\UpdateSubjectDto;
use App\Exceptions\InvalidDataGivenException;
use App\Exceptions\ItemNotFoundException;
use App\Exceptions\UknownException;
use App\Models\ClassSetup;
use App\Models\Subject;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class SubjectService extends AbstractService
{



    /**
     * @throws Exception
     */
    public function createSubject(CreateSubjectDto $data): Subject
    {

        $subjectName = $data->subjectName;
        $classId = $data->classId;
        $userId = $data->userId;



        $subjectExists = Subject::where("name", $subjectName)->exists();
        if ($subjectExists) {
            throw new InvalidDataGivenException("Subject  already exists");
        }

        $class = ClassSetup::find($classId);
        if (is_null($class)) {
            throw new ItemNotFoundException("There is no such Class");
        }


        $user = User::find($userId);
        if (is_null($user)) {
            throw new ItemNotFoundException("The Subject does not exist");
        }


        try {
            $subject = Subject::create([
                "name" => $subjectName,
                "user_id" => $userId,
                "class_id" => $classId,

            ]);

            return $subject;
        } catch (Exception $th) {
            Log::error("Failed to create Subject ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new UknownException("Sorry, there were some issues, contact the system admin");
        }
    }

    public function getSubject(int $id): ?Subject
    {
        $subject = Subject::find($id);
        if (is_null($subject)) {
            throw new ItemNotFoundException("Sorry, user can not be found");
        }
        return $subject;
    }

    public function allSubjects(): Collection
    {
        $subjects = Subject::all();

        return $subjects;
    }

    public function subjectsPerClass(int $classId): Collection
    {
        $subjects = Subject::where("class_id", "=", $classId)->get();
        return $subjects;
    }

    public function subjectsPerUser(int $userId): Collection
    {
        $subjects = Subject::where("user_id", "=", $userId)->get();

        return $subjects;
    }


    public function updateSubject(UpdateSubjectDto $data, int $id): Subject
    {
        $subject = Subject::find($id);
        if (is_null($subject)) {
            throw new InvalidDataGivenException("The subject does not exist");
        }

        $subjectName = $data->subjectName;
        $classId = $data->classId;
        $userId = $data->userId;

        try {
            $subject->update([
                "subjectName" => $subjectName,
                "user_id" => $userId,
                "class_id" => $classId,
            ]);

            return $subject;
        } catch (Exception $th) {

            Log::error("Failed to update subject ", [
                "message" => $th->getMessage(),
                "function" => __FUNCTION__,
                "class" => __CLASS__,
                "trace" => $th->getTrace()
            ]);
            throw new UknownException("Sorry, there were some issues, contact the system admin");
        }
    }
    public function destroySubject(int $id): bool
    {
        $subject = Subject::find($id);
        if (is_null($subject)) {
            throw new InvalidDataGivenException("The subject does not exist");
        }

        return $subject->delete();
    }
}