<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    /** @use HasFactory<\Database\Factories\DesaFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'kecamatan_id'
    ];
    public function kecamatan(){
        return $this->belongsTo(kecamatan::class);
    }

    public function alamat(){
        return $this->hasMany(alamat::class);
    }
}
