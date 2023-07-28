<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Breaktime;
use App\Models\Workhour;

class BreaktimeFactory extends Factory
{
    protected $model = Breaktime::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'workhour_id' => Workhour::factory()->create()->id,
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time()
        ];
    }
}
