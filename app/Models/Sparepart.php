<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $table = 'spareparts';
    public $timestamps = true;

    protected $fillable = [
        'kodeSP',
        'namaSP',
        'fileObjek',
        'created_at',
        'updated_at',
    ];
}
