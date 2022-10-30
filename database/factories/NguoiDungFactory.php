<?php

namespace Database\Factories;

use App\Models\Quyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NguoiDung>
 */
class NguoiDungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'username' => fake()->userName(),
            'TenNguoiDung' => fake()->name(),
            'HoNguoiDung' => fake()->lastName(),
            'Password' => fake()->password(),
            'NickName' => fake()->name(),
            'AnhDaiDien' => fake()->imageUrl($width = 640, $height = 640),
            'Email' => fake()->unique()->email(),
            'SDT' => fake()->phoneNumber(),
            'MaQuyen' => Quyen::query()->inRandomOrder()->value('id')
        ];
    }
}
