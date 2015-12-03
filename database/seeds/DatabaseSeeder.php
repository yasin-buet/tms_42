<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(DailyReportsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(CourseSubjectTableSeeder::class);
        $this->call(CourseUserTableSeeder::class);
        $this->call(SubjectUserTableSeeder::class);
        $this->call(TaskUserTableSeeder::class);

        Model::reguard();
    }
}
