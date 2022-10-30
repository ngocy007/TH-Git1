<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use App\Models\Truyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BinhLuan>
 */
class BinhLuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'NoiDungBL'=>fake()->text(100),
            'DanhGia' => fake()->numberBetween(1,5),
            'MaTruyen' => Truyen::query()->inRandomOrder()->value('id'),
            'MaNguoiDung' => NguoiDung::query()->inRandomOrder()->value('id'),
        ];
    }
}
