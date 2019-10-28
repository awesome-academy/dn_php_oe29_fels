<?php

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
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
                'content' => 'See you',
                'type' => config('constants.question_type.vocabulary'),
                'lesson_id' => 1,
            ],
        ];

        Question::truncate();
        Question::insert($data);
    }
}
