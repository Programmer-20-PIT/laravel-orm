<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat extends Model
{
    /** @use HasFactory<\Database\Factories\AlamatFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'desa_id'
    ];

    public function desa(){
        return $this->belongsTo(desa::class);
    }
}
