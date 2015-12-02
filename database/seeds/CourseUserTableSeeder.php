<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Course;
use App\User;
use App\CourseUser;

class CourseUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $count = User::count();
        $courseCount = Course::count();
        foreach (range(1, $count) as $index) {
            $courseUser = CourseUser::create([
                'user_id' => $index,
                'course_id' => (($index + 1)%$courseCount) + 1,
                'start_date' => $faker->dateTime,
                'end_date' => $faker->dateTime,
                'is_currently_enrolled' => 0,
            ]);
            $courseUser = CourseUser::create([
                'user_id' => $index,
                'course_id' => (($index + 2)%$courseCount) + 1,
                'start_date' => $faker->dateTime,
                'end_date' => $faker->dateTime,
                'is_currently_enrolled' => 0,
            ]);
            $courseUser = CourseUser::create([
                'user_id' => $index,
                'course_id' => (($index + 3)%$courseCount) + 1,
                'start_date' => $faker->dateTime,
                'end_date' => $faker->dateTime,
                'is_currently_enrolled' => 1,
            ]);
        }
    }
}
