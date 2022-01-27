<?php

namespace Database\Factories;

use App\Models\Domain;
use App\Models\PublicationState;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $description = $this->faker->realText(5000);
        return [

            'description' => $description,
            'domain_id' => Domain::all()->random()->id,
            'publication_state_id' => PublicationState::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'title' => Str::limit(Str::words($description, rand(3, 5), ''), 40, ''),
        ];
    }
}
