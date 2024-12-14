<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'varshitha',
                'email' => 'varshithabkalmath@gmail.com',
                'password' => '$2y$10$bPqINBmsqMjOV4j0IRrLdeA03BsGGRSIUpjeYCL0sGDxmIIKYXo7G',
                'user_type' => 'user'
            ],
            [
                'name' => 'abhi',
                'email' => 'varshithabktest@gmail.com',
                'password' => '$2y$10$tkPaLxy7NdpdURM2AQkvV.YIq0LW8VZ73qb0QNgA9q7M9mxG1f/6C',
                'user_type' => 'admin'
            ]
        ]);
    }
}
