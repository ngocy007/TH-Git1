<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
   use HasFactory;
    protected $table ='BinhLuan';
    protected $fillable = [
        'NoiDungBL',
        'MaTruyen',
        'MaNguoiDung',
    ];


    function user()
    {
       return $this->belongsTo(User::class,'MaNguoiDung');
    }
}
