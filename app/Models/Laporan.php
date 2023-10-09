<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{    
    public function user()
    {
        return $this->belongsTo(User::class, 'no_reg', 'no_reg');
    }
    protected $table = 'laporans';
    protected $fillable = ['NoLot', 'kodejoint', 'Std_CH', 'N1', 'N2', 'N3', 'Std_Tes', 'N1_Tes', 'Hasil', 'W_Set', 'W_Tes'];
    public $timestamps = false;
    use HasFactory;
}
