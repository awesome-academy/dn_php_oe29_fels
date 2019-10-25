<?php

use Illuminate\Database\Seeder;
use App\Models\AnswerOption;

class AnswerOptionsTableSeeder extends Seeder
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
                'content' => 'Hen gap lai',
                'is_correct' => config('constants.result.correct'),
                'question_id' => 1,
            ],
            [
                'content' => 'Tao ve nhe',
                'is_correct' => config('constants.result.incorrect'),
                'question_id' => 1,
            ],
            [
                'content' => 'Tam biet',
                'is_correct' => config('constants.result.incorrect'),
                'question_id' => 1,
            ],
            [
                'content' => 'Xin cam on',
                'is_correct' => config('constants.result.incorrect'),
                'question_id' => 1,
            ],
        ];

        AnswerOption::truncate();
        AnswerOption::insert($data);
    }
}
