<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\DailyReport;
use App\User;

class DailyReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $index) {
            $users = DailyReport::create([
                'user_id' => User::orderByRaw('RAND()')->first()->id,
                'start_time' => $faker->dateTime,
                'end_time' => $faker->dateTime,
                'achievement' => $faker->sentence,
                'next_day_plan' => $faker->sentence,
                'comment' => $faker->sentence,
            ]);
        }
    }
}
