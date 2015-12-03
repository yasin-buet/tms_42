<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 
use App\Subject; 

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 5) as $index) {
            $subjects = Subject::create([
                'name' => $faker->word,
                'description' => $faker->text,
            ]);
        }
    }
}
