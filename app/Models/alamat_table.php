<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alamat_table extends Model
{    /** @use HasFactory<\Database\Factories\AlamatTableFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'alamat_id',
        'alamattable_id',
        'alamattable_type',
    ];

    public function alamattable(){
        return $this->morphTo();
    }

    public function alamat(){
        return $this->belongsTo(alamat::class , 'alamat_id');
    }

}
