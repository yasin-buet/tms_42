<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Course;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $courses = Course::create([
                'name' => $faker->word,
                'description' => $faker->text,
                'start_date' => $faker->dateTime,
                'end_date' => $faker->dateTime,
                'is_finished' => rand(0, 1),
            ]);
        }
    }
}
