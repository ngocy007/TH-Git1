<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table ='BinhLuan';
    protected $fillable=[
        'NoiDungBL',
        'DanhGia',
        'MaTruyen',
        'MaNguoiDung'
    ];
    use HasFactory;
    public function User()
    {
        return $this->belongsToMany(User::class, 'binhluan','id','MaNguoiDung');
    }
    public function Truyen()
    {
        return $this->belongsToMany(Truyen::class, 'binhluan','id','MaTruyen');
    }
}
