<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'kamar';
    protected $fillable = [
        'kos_id',
        'nomor_kamar',
        'fasilitas',
        'kamar_mandi',
        'foto_kamar'
    ];
}
