<?php

namespace Database\Factories;

use App\Models\Shipment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shipment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'waybill' => $this->faker->title,
            'customer_address' => $this->faker->address,
            'customer_name' => $this->faker->name,
            'customer_phone' => $this->faker->phoneNumber,
        ];
    }
}
