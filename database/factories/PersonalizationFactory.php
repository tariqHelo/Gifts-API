<?php

namespace Database\Factories;

use App\Models\Personalization;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonalizationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Personalization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['active', 'draft'];

        //$name = $this->faker->name();

        return [
            'name' => $this->faker->word,
            'status' => $status[rand(0, 1)],
        ];
    }
}
