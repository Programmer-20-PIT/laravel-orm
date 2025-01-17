<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pondok extends Model
{
    /** @use HasFactory<\Database\Factories\PondokFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function kawasan(){
        return $this->hasMany(kawasan::class);
    }
    public function user(){
        return $this->hasMany(user::class);
    }
    public function alamat_table(){
        return $this->morphOne(alamat_table::class,'alamattable');
    }
}
