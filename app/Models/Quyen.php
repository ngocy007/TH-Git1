<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    protected $table='Quyen';
    protected $fillable= ['TenQuyen','ChucNang'];
    use HasFactory;
}
