<?php

use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'title' => 'French Greetings',
                'course_id' => 1,
            ],
            [
                'title' => 'English Greetings',
                'course_id' => 1,
            ],
            [
                'title' => 'English Words',
                'course_id' => 2,
            ],
            [
                'title' => 'French Words',
                'course_id' => 2,
            ],
        ];

        Lesson::truncate();
        Lesson::insert($data);
    }
}
