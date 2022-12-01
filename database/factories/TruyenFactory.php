<?php

namespace Database\Factories;
<<<<<<< HEAD
=======

use App\Models\NguoiDung;
>>>>>>> 1d3dab49d3be908ed2a108dd5366318c5664a32d
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
            'TrangThai'=>fake()->randomElement(['Chưa được kiểm duyệt', 'Ngừng','Đang ra','Hoàn Thành']),
            'TenTacGia'=>fake()->name(),
        ];
    }
}
