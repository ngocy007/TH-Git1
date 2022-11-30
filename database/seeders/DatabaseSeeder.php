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

        User::factory(1)->definition();
        Truyen::factory(100)->create();
        LichSu::factory(100)->create();
        DB::table('Chuong')->insert([
            'MaTruyen'=> '2',
            'SoChuong'=> '4',
            'TenChuong'=> 'ý vvv',
            'NoiDung'=> 'ý heo',
        ]);

        DB::table('Chuong')->insert([
            'MaTruyen'=> '1',
            'SoChuong'=> '1',
            'TenChuong'=> 'chi lol',
            'NoiDung'=> 'chi an cuc',
        ]);

        BinhLuan::factory(100)->create();
        CT_Loai::factory(20)->create();
        TheoDoi::factory(200)->create();
    }
    // đọc giáo án đi hihi :>
}
