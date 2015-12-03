<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Task;
use App\Subject;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 15) as $index) {
            $tasks = Task::create([
                'subject_id' => Subject::orderByRaw('RAND()')->first()->id,
                'name' => $faker->word,
                'description' => $faker->text,
                'end_date' => $faker->dateTime,
            ]);
        }
    }
}
