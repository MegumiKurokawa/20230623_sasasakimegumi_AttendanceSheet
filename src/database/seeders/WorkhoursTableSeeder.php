<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workhour;

class WorkhoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workhour::factory(10)->create();
    }
}
