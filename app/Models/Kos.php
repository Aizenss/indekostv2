<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;
    protected $table = 'kosts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kost',
        'ketentuan',
        'lokasi',
        'spesifikasi',
        'peraturan',
        'harga',
        'fasilitas_kamar',
        'fasilitas_kamar_mandi',
        'fasilitas_tempat_parkir',
        'foto_depan',
        'foto_dalam',
        'foto_tambahan'
    ];
}
