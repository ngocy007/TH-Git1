<?php

namespace Database\Factories;

use App\Models\TheLoai;
use App\Models\Truyen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CT_LoaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'MaLoai' => TheLoai::query()->inRandomOrder()->value('id'),
            'MaTruyen' => Truyen::query()->inRandomOrder()->value('id'),
        ];
    }
}
