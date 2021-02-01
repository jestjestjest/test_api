<?php

namespace Database\Factories;

use App\Models\Receipts;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReceiptsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receipts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->randomDigitNotNull,
            'name' => $this->faker->word(),
            'ingredients' => '{	"ingredient1": "100g", "ingredient2": "2", "ingredient3": "1/2 glass" }',
            'description' => $this->faker->sentence
        ];
    }
}
