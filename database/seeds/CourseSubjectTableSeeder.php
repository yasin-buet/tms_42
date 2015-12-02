<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Course;
use App\Subject;
use App\CourseSubject;

class CourseSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $subjectCount = App\Subject::count();
        $courseCount = App\Course::count();
        foreach (range(1, $courseCount) as $courseIndex) {
            foreach (range(1, $subjectCount/2) as $subjectIndex) {
                $courseSubject = CourseSubject::create([
                    'course_id' => $courseIndex,
                    'subject_id' => (($courseIndex + $subjectIndex)%$subjectCount) + 1,
                    'start_date' => $faker->dateTimeBetween('+1 month', '+3 month'),
                    'end_date' => $faker->dateTimeBetween('+6 month', '+9 month'),
                    'is_finished' => rand(0, 1),
                ]);
            }
        }
    }
}

