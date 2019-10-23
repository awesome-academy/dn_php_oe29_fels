<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
                'name' => 'Nguyen Ba Tung',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
                'role' => config('constants.role.admin'),
            ],
            [
                'name' => 'Nguyen Ba Tung',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user'),
                'role' => config('constants.role.user'),
            ],
        ];

        User::truncate();
        User::insert($data);
    }
}
