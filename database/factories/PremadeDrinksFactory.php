<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PremadeDrinks;

use function PHPUnit\Framework\isTrue;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PremadeDrinks>
 */
class PremadeDrinksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PremadeDrinks::class;

    public function definition(): array
    {
        return [  
            'name' => 'Mango Peachy', 
            'description' => 'mango and peach green tea flavoured with coconut jelly', 
            'price' => 5, 
            'image' => 'mango_peach.png', 
            'isLimited' => false 
        ];
    }
}
