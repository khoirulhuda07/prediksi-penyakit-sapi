<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $primaryKey = 'ID_GEJALA';
    public $timestamps = false;
    protected $fillable = [
        'KODE_GEJALA',
        'NAMA_GEJALA',
    ];
    public function penyakit()
    {
        return $this->belongsToMany(penyakit::class, 'rule', 'ID_GEJALA', 'ID_PENYAKIT');
    }
}
