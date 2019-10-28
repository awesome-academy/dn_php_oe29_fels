<?php

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesTableSeeder extends Seeder
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
                'title' => 'English Hello 1',
                'description' => 'English Hello',
            ],
            [
                'title' => 'English Hello 2',
                'description' => 'English Hello',
            ],
            [
                'title' => 'English Hello 3',
                'description' => 'English Hello',
            ],
            [
                'title' => 'English Hello 4',
                'description' => 'English Hello',
            ],
            [
                'title' => 'English Hello 5',
                'description' => 'English Hello',
            ],
        ];

        Course::truncate();
        Course::insert($data);
    }
}
