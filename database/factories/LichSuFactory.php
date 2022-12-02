<?php

namespace Database\Factories;

use App\Models\Chuong;

use App\Models\Truyen;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LichSu>
 */
class LichSuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'MaNguoiDung' => User::query()->inRandomOrder()->value('id'),
            'MaTruyen' => Truyen::query()->inRandomOrder()->value('id'),
            'MaChuong' => Chuong::query()->inRandomOrder()->value('id'),
        ];
    }
}
