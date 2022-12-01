<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    protected $table = 'Truyen';
    protected $fillable=[
        'id',
        'TenTruyen',
        'AnhDaiDien',
        'DanhGiaTB',
        'LuotXem',
        'MoTa',
        'TrangThai',
        'TenTacGia',
        'MaNguoiDung'
    ];
    use HasFactory;
    public function User()
    {
        return $this->belongsToMany(User::class, 'truyen','id','MaNguoiDung');
    }
}
