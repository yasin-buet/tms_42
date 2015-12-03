<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Subject;
use App\User;
use App\TaskUser;
use App\Course;
use App\Task;

class TaskUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = App\User::all();
        foreach ($users as $user) {
            $userId = $user->id;
            $courseId = $user->course()->first()->id;
            foreach ($user->subjects as $subject) {
                $subjectId = $subject->id;
                foreach ($subject->tasks as $task) {
                    $taskUser = TaskUser::create([
                        'user_id' => $userId,
                        'task_id' => $task->id,
                        'course_id' => $courseId,
                        'subject_id' => $subjectId,
                        'status' => rand(0, 1),
                    ]);
                }
            }
        }
    }
}

