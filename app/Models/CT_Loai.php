<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CT_Loai extends Model
{
    protected $table = 'CT_Loai';
    use HasFactory;
    protected $fillable = [
        'MaTruyen',
        'MaLoai'
    ];
}
