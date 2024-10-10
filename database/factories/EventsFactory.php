<?php

namespace Database\Factories;

use App\Models\Events;
use App\Models\invitation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\events>
 */
class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Events::class;


    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'event_name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->address,
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}
