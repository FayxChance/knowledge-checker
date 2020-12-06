<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use Faker\Factory;

class GroupsTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::truncate();

        $faker = Factory::create();
    }
}
