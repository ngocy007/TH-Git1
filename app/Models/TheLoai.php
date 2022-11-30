<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    protected $table = 'TheLoai';

    use HasFactory;

    protected $fillable = [
        'TenLoai'
    ];
}
