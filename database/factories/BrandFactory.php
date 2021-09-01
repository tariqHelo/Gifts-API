<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['active', 'draft'];

        $name = $this->faker->name();
     //   dd($name);
        return [
            'name' => $name,
            'status' => $status[rand(0, 1)],
        ];
    }
}
