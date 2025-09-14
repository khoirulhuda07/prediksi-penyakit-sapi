<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rules extends Model
{
    use HasFactory;
    protected $table = 'rule';
   
    public $timestamps = false;
    protected $fillable = [
        'ID_GEJALA',
        'ID_PENYAKIT',
    ];
    public function penyakit()
    {
        return $this->belongsTo(penyakit::class);
    }
    public function gejala()
    {
        return $this->belongsTo(gejala::class);
    }
}
