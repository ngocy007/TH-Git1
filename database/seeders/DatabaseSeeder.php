<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BinhLuan;
use App\Models\Chuong;
use App\Models\CT_Loai;
use App\Models\LichSu;
use App\Models\Quyen;
use App\Models\TheLoai;
use App\Models\TheoDoi;
use App\Models\Truyen;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('Quyen')->insert([
            'TenQuyen' => 'admin',
            'ChucNang' => 'all',
        ]);
        DB::table('TheLoai')->insert([
            'TenLoai' => 'sex'
        ]);
        DB::table('TheLoai')->insert([
            'TenLoai' => 'trong sinh'
        ]);
        DB::table('TheLoai')->insert([
            'TenLoai' => 'trang buc'
        ]);

        User::factory(30)->create();

        Truyen::factory(100)->create();

        Chuong::factory(200)->create();
       LichSu::factory(100)->create();
        BinhLuan::factory(100)->create();
        CT_Loai::factory(20)->create();
        TheoDoi::factory(200)->create();
    }
    // đọc giáo án đi hihi :>
}
