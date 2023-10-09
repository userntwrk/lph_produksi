<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    protected $fillable = [
        'partname',
        'skema',
        'status',
        'size',
        'warna',
        'kode_joint',
        'terminal',
        'std_ch',
    ];

    public $timestamps = false;
    use HasFactory;
}
