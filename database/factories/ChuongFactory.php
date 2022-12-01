<?php

namespace Database\Factories;

use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chuong>
 */
class ChuongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return [
           'TenChuong' =>fake()->name(),
           'NoiDung' => fake()->text(200),
           'SoChuong' => fake()->randomNumber($nbDigits = NULL, $strict = false),
           'MaTruyen' => Truyen::query()->inRandomOrder()->value('id')
       ];
    }
}
