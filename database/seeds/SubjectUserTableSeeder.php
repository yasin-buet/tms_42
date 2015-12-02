<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Subject;
use App\User;
use App\SubjectUser;
use App\Course;

class SubjectUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        foreach ($users as $user) {
            foreach ($user->course()->first()->subjects as $subject) {
                $subjectUser = SubjectUser::create([
                    'user_id' => $user->id,
                    'course_id' => $subject->pivot->course_id,
                    'subject_id' => $subject->id,
                    'status' => rand(0, 1),
                    'progress' => $faker->numberBetween($min = 0, $max = 100), 
                ]);
            }
        }
    }
}
