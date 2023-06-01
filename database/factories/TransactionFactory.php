<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_id' => Account::factory(),
            'operation' => $this->faker->randomElement(['entrada', 'saida']),
            'price' => '10.00',
            'description' => $this->faker->sentence(20),
        ];
    }
}
