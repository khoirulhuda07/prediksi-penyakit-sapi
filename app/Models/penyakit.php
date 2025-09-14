<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakit';
    protected $primaryKey = 'ID_PENYAKIT';
    public $timestamps = false;
    protected $fillable = [
        'KODE_PENYAKIT',
        'PENYAKIT',
        'solusi',
        'pencegahan',
    ];
    public function gejala()
    {
        return $this->belongsToMany(gejala::class, 'rule', 'ID_PENYAKIT', 'ID_GEJALA');
    }
}
