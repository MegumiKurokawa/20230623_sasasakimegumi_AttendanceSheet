<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Breaktime;

class BreaktimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Breaktime::factory(10)->create();
    }
}
