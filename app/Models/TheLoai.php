<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class TheLoai extends Model
{
    protected $table='TheLoai';
    protected $fillable= ['TenLoai','id'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    use HasFactory,Notifiable, Searchable;
    /*public function toSearchableArray()
    {
        return [
            'id' => $this->id,

        ];
    }*/
}
