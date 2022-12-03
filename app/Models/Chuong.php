<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chuong extends Model
{
    protected $table = 'Chuong';

    use HasFactory;

    protected $fillable = [
        'MaTruyen',
        'SoChuong',
        'TenChuong',
        'NoiDung'
    ];
    
    function truyen()
    {
       return $this->belongsTo(Truyen::class,'MaTruyen');
    }

}
