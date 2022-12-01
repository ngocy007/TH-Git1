<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
   use HasFactory;
    protected $table ='BinhLuan';
<<<<<<< HEAD
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
=======
    protected $fillable = [
        'NoiDungBL',
        'MaTruyen',
        'MaNguoiDung',
    ];


    function user()
    {
       return $this->belongsTo(User::class,'MaNguoiDung');
>>>>>>> 1d3dab49d3be908ed2a108dd5366318c5664a32d
    }
}
