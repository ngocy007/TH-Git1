<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    protected $table = 'Truyen';
    use HasFactory;

    protected $fillable = [
        'TenTruyen',
        'AnhDaiDien',
        'DanhGiaTB',
        'LuotXem',
        'MoTa',
        'TrangThai',
        'TenTacGia',
        'MaNguoiDung',
        'created_at',
        'update_at'
    ];


}
