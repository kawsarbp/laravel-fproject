<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Symfony\Component\Finder\name;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function myuser()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
        ]);

    }


    public function run()
    {
        $this->myuser();
        $faker = Factory::create();
        foreach (range(1,12) as $index)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt($faker->password)
            ]);
        }
    }
}
