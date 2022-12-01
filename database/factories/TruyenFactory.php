<?php

namespace Database\Factories;

use App\Models\NguoiDung;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Truyen>
 */
class TruyenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'MaNguoiDung' => User::query()->inRandomOrder()->value('id'),
            'TenTruyen' => fake()->name(),
            'AnhDaiDien'=>fake()->imageUrl($width = 640, $height = 480),
            'DanhGiaTB'=>fake()->numberBetween(1,5),
            'LuotXem'=>fake()->randomNumber($nbDigits = NULL, $strict = false),
            'MoTa'=>fake()->text(500),
            'TrangThai'=>fake()->randomElement(['ngung', 'dang ra','hoan thanh']),
            'TenTacGia'=>fake()->name(),
        ];
    }
}
