<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function randstatus()
    {
        $status = ['active'=>'active','inactive'=>'inactive'];
        return array_rand($status);
    }
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,10) as $index)
        {
            $name = $faker->name;
            Category::create([
                'user_id' => rand(1,13),
                'name' => $name,
                'slug' => strtolower(str_replace(' ','-',$name)),
                'status' => $this->randstatus(),
            ]);
        }
    }
}
