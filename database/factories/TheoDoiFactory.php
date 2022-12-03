<?php

namespace Database\Factories;


use App\Models\Truyen;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TheoDoi>
 */
class TheoDoiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'MaTruyen' => Truyen::query()->inRandomOrder()->value('id'),
            'MaNguoiDung' => User::query()->inRandomOrder()->value('id')
        ];
    }
}
